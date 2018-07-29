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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHome(Request $request){

        $title = 'Home';
        return view('npms.site.pages.home', ['title' => $title]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout(Request $request){

        $title = 'About';
        return view('npms.site.pages.about', ['title' => $title]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProcess(Request $request){

        $title = 'Process';
        return view('npms.site.pages.process', ['title' => $title]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAssessment(Request $request){

        $title = 'About';
        return view('npms.site.pages.assessment', ['title' => $title]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact(Request $request){


        $title = 'Contact';
        return view('npms.site.pages.contact', ['title' => $title]);

    }
}
