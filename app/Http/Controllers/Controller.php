<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChangeLog;
use App\Models\SettingSite;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $site_setting = SettingSite::all()->keyBy('key');
        $version = ChangeLog::latest()->first();
        $bankList = collect(json_decode(file_get_contents("app/custom/json/bank.json"), true));
        View::share(compact('site_setting', 'version', 'bankList'));
    }

    public function structure()
    {
        return view('app.structure');
    }
}
