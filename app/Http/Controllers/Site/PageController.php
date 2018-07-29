<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * Class PageController
 *
 * @package App\Http\Controllers
 */
class PageController extends Controller
{

    /**
     * @param Request $request
     */
    public function getHome(Request $request){


        $title = 'Home';
        return view('npms.site.pages.home', ['title' => $title]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact(Request $request){


    }
}
