<?php

namespace App\Http\Controllers\Site;

use App\Answers;
use App\Repository\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $question_id = $post['question_id'];
        $answer_ids = explode(',', $post['answer_id']);

        $data = [
            'question' => $question_id,
            'answers' => $answer_ids
        ];

        $answers = Answers::with('labels')->whereIn('id', $answer_ids)->get();

        $label_ids = [];


        foreach($answers as $answer){


            foreach ($answer->labels->toArray() as $label){

                array_push($label_ids, $label['id']);

            }

        }


        return $label_ids;

    }

}
