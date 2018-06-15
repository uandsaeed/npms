<?php

    namespace App\Http\Controllers\Admin;

    use App\Events\LabelCreated;
    use App\Repository\LabelRepository;

    use App\Repository\QuestionRepository;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Log;

    class LabelController extends Controller
    {

        private  $repo = null;

        public function __construct()
        {
            $this->repo = new LabelRepository();
        }

        public function index(Request $request){

            $title = 'Browse Labels';
            $posts = $request->all();
            $page = isset($posts['page']) ? $posts['page'] : 1;

            $labels = $this->repo->getAllPaginated($page);

            return view('npms.admin.label.index', ['title' => $title, 'labels' => $labels]);

        }

        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create(){

            $title = 'Create Label';

            $questionRepo = new QuestionRepository();
            $questions = $questionRepo->getAll();

            return view('npms.admin.label.create', ['title' => $title, 'questions' => $questions]);
        }

        /**
         * @todo add validation
         *
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function insert(Request $request){

            $posts = $request->all();

            $label = $this->repo->insert($posts);

            if ($label){

                Log::info('LabelController::insert success', $label->toArray());

                event(new LabelCreated($label));

                return response()->redirectTo('/admin/label');

            } else{

                echo 'problem';
            }
        }

        public function update(Request $request, $id){

            $posts = $request->all();

            $label = $this->repo->update($posts, $id);

            if ($label){
                return response()->redirectTo('/admin/label');
            } else{

                echo 'problem';
            }

        }

        public function show($id){

        }

        public function edit($id){

            $label = $this->repo->findById($id);

            $title = 'Edit '.$label->title;

            $questionRepo = new QuestionRepository();
            $questions = $questionRepo->getAll();


            return view('npms.admin.label.create', ['title' => $title, 'label' => $label,
                                                    'questions' => $questions]);

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

            return response()->redirectTo('/admin/label');


        }


    }
