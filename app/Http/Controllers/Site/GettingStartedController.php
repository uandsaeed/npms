<?php

namespace App\Http\Controllers\Site;

use App\Answers;
use App\Product;
use App\Repository\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GettingStartedController extends Controller
{
    private $repo;

    /**
     * GettingStartedController constructor.
     */
    public function __construct()
    {
        $this->repo = new QuestionRepository();
    }

    public function index(){

        $questions = $this->repo->getActiveQuestions();

        $title = 'Home';
        return view('npms.site.home.index', ['title' => $title, 'questions' => $questions]);

    }

    /**
     * @param Request $request
     * @return string
     */
    public function searchProducts(Request $request){

        $post = $request->all();
        $answer_ids = explode(',', $post['answers']);

//        dd($answer_ids);
//        $tmp_answer_ids = ["401",
//            "396",
//            "389",
//            "372",
//            "367",
//            "363",
//            "358",
//            "353",
//            "348",
//            "342",
//            "337",
//            "332",
//            "326",
//        ];

        $answers = array_filter(Answers::with('labels')->whereIn('id', $answer_ids)
            ->get()
            ->pluck('labels')
            ->toArray());

//        $answers = Answers::with('labels')->whereIn('id', $tmp_answer_ids)->get();

        $positives = [];
        $negatives = [];

        foreach ($answers as $answer){

            if ($answer[0]['match']['label'] == 'Positive'){
                array_push($positives, $answer[0]['id']);
            } elseif($answer[0]['match']['label'] == 'Negative'){
                array_push($negatives, $answer[0]['id']);
            }
        }


//        echo 'Positive<br><pre>';
//        var_dump( array_values($positives));
//        echo '</pre>';
//
//        echo 'Negative<br><pre>';
//
//        var_dump($negatives);
//        echo '</pre>';
//
//        die();
//
//        dd($answers);


//        $products = [];
        // @link https://laravel.io/forum/03-20-2014-searching-many-to-many-relationships
        // search in products with label ids

        $products = Product::whereHas('labels', function ($query) use($positives) {

            $query->whereIn('label_id', $positives);

        })->get();

        $products = $products->unique('title');



        return redirect('/search/recommendation')->with( [ 'products' => $products] );

    }

    public function getSearchResult(){

        $title = 'Search Result';

        $products = Session::get('products') ;


        return view('npms.site.search.index', ['title' => $title, 'products' => $products]);


    }

}
