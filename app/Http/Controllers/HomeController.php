<?php

namespace App\Http\Controllers;

use App\Label;
use App\Product;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCount = Cache::tags(['counter'])->remember('productCount', 20, function (){

            return Product::all()->count();
        });

        $questionCount = Cache::tags(['counter'])->remember('questionCount', 20, function (){

            return Question::all()->count();
        });


        $labelCount = Cache::tags(['counter'])->remember('labelCount', 20, function (){

            return Label::all()->count();
        });


        return view('npms.admin.home' , ['products' => $productCount, 'questions' => $questionCount, 'labels' => $labelCount]);
    }
}
