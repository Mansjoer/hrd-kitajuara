<?php

namespace App\Http\Controllers;

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
        View::share(compact('site_setting', 'version'));
    }
}
