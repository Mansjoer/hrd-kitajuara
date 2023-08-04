<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use App\Models\SettingSite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $settingTitle = SettingSite::where('key', 'title')->first();
        $settingSubtitle = SettingSite::where('key', 'subtitle')->first();
        $settingFooterCopyrightName = SettingSite::where('key', 'footerCopyrightName')->first();
        $footerCopyrightYear = SettingSite::where('key', 'footerCopyrightYear')->first();

        $changelogs = ChangeLog::orderByDesc('version')->get();

        return view('app.pages.admin.index', compact('changelogs', 'settingTitle', 'settingSubtitle', 'settingFooterCopyrightName', 'footerCopyrightYear'));
    }

    public function postSiteSetting(Request $request)
    {
        $settingTitle = SettingSite::where('key', 'title')->first();
        $settingSubtitle = SettingSite::where('key', 'subtitle')->first();
        $settingFooterCopyrightName = SettingSite::where('key', 'footerCopyrightName')->first();
        $footerCopyrightYear = SettingSite::where('key', 'footerCopyrightYear')->first();

        $settingTitle->update([
            'value' => $request->title
        ]);

        $settingSubtitle->update([
            'value' => $request->subtitle
        ]);

        $settingFooterCopyrightName->update([
            'value' => $request->footerName
        ]);

        $footerCopyrightYear->update([
            'value' => $request->footerYear
        ]);

        return redirect()->back();
    }

    public function addChangeLog(Request $request)
    {
        ChangeLog::create([
            'name' => $request->name,
            'version' => $request->version,
            'data' => $request->data,
            'slug' => Str::slug($request->name . $request->version),
        ]);
        return redirect()->back();
    }

    public function deleteChangeLog(Request $request)
    {
        return redirect()->back();
    }
}
