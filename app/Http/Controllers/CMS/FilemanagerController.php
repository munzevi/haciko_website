<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;

class FilemanagerController extends Controller
{
    protected static $success_response = 'OK';

    /**
     * Set up needed functions.
     *
     * @return object|null
     */
    public function __get($var_name)
    {
        if ($var_name === 'lfm') {
            return app(LfmPath::class);
        } elseif ($var_name === 'helper') {
            return app(Lfm::class);
        }
    }

    /**
     * Show Filemanager at dashboard
     * @return mixed
     */
    public function files()
    {
        return view('backend.pages.filemanager')
            ->withHelper($this->helper);
    }

}
