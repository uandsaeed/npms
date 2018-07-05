<?php

namespace App\Http\Controllers\Site;

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

        $question = $this->repo->firstQuestion();

        $title = 'Home';
        return view('npms.site.home.index', ['title' => $title, 'question' => $question]);

    }

}
