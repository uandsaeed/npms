<?php

namespace App\Http\Controllers\Admin;

use App\Repository\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    private  $repo = null;

    public function __construct()
    {
        $this->repo = new QuestionRepository();
    }

    public function index(){

        $title = 'Browse Questions';

        $questions = $this->repo->getAllPaginated();

        return view('npms.admin.question.index', ['title' => $title, 'questions' => $questions]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $title = 'Create Questions';

        return view('npms.admin.question.create', ['title' => $title]);
    }

    public function insert(Request $request){

        $posts = $request->all();

        $question = $this->repo->insert($posts);

        if ($question){
            return response()->redirectTo('/admin/question');
        } else{

            echo 'problem';
        }
    }

    public function update(Request $request, $id){

        $question = $this->repo->findById($id);

        $posts = $request->all();
        $question->title = $posts['title'];
        $question->description = $posts['description'];

        $question = $this->repo->update($posts, $id);

        if ($question){
            return response()->redirectTo('/admin/question');
        } else{

            echo 'problem';
        }

    }

    public function show($id){

    }

    public function edit($id){

        $question = $this->repo->findById($id);

        $title = 'Edit '.$question->title;

        return view('npms.admin.question.create', ['title' => $title, 'question' => $question]);

    }

    /**
     * @todo add policy
     * @todo add cache and clear after delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){

        $question = $this->repo->findById($id);

        $question->delete();

        return response()->redirectTo('/admin/question');


    }


}
