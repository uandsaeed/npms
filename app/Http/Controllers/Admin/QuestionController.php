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

    public function index(Request $request){

        $title = 'Browse Questions';
        $posts = $request->all();
        $page = isset($posts['page']) ? $posts['page'] : 1;

        $questions = $this->repo->getAllPaginated($page);

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

//        $question = $this->repo->findById($id);

        $posts = $request->all();
//        $question->title = $posts['title'];
//        $question->description = $posts['description'];
//        $question->sort = $posts['sort'];
//        $question->is_active = isset($posts['is_active']) ? $posts['is_active']: 0;

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

        $this->repo->flushById($id);
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

        $status = $this->repo->delete($id);

        return response()->redirectTo('/admin/question');


    }


}
