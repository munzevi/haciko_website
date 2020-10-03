<?php

namespace App\Http\Controllers\CMS;

use App\Services\FrontendServices;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index(FrontendServices $frontend)
    {
        return view('frontend.layouts.app')
            ->with('contents',$frontend->getPageContent());
    }

}
