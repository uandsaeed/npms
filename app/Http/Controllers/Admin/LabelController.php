<?php

    namespace App\Http\Controllers\Admin;

    use App\Events\LabelCreated;
    use App\Jobs\SyncLabelJob;
    use App\Repository\LabelRepository;

    use App\Repository\QuestionRepository;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Storage;
    use Maatwebsite\Excel\Facades\Excel;

    /**
     * Class LabelController
     *
     * @package App\Http\Controllers\Admin
     */
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
         * @return \Illuminate\Http\JsonResponse
         */
        public function getList(){

            $labels = $this->repo->getAllList();

            return response()->json(['labels' => $labels])->setStatusCode(200);

        }

        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create(){

            $title = 'Create Label';

            return view('npms.admin.label.create', ['title' => $title]);
        }

        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function getImport(){

            $title = 'Import Label';

            return view('npms.admin.label.import', ['title' => $title]);
        }


        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function getSearch(Request $request){

            $posts = $request->all();

            $title = 'Search Label: '.$posts['search'];
            $page = isset($posts['page']) ? $posts['page'] : 1;

            //@todo if $posts['search'] not found..
            $labels = $this->repo->search($posts['search'], $page);

            return view('npms.admin.label.index', ['title' => $title, 'labels'=> $labels]);

        }

        public function postUploadList(Request $request){


            $storage = Storage::disk();

            $year   = date('Y', strtotime(now()));
            $month  = date('m', strtotime(now()));
            $day    = date('d', strtotime(now()));

            $originalName = $request->file('qqfile')->getClientOriginalName();

            $path = 'labels/'.$year.'/'.$month.'/'.$day;

            $path = $storage->putFileAs($path, $request->file('qqfile'), $originalName);

            $path = storage_path('app/'.$path);



            try {
                $rows = [];


                $labelRepo = $this->repo;
                Excel::load($path, function ($reader) use(&$rows, $labelRepo ){

                    foreach ($reader->toArray() as $item) {

                        foreach ($item as $title){

                            if ($title !== null){

                                $label['title']           = $title;
                                $label['description']     = $title;
                                $label['keywords']        = $title;
                                $label['type']            = LABEL_TYPE_INGREDIENTS;
                                $label['weight']          = LABEL_WEIGHT_MEDIUM;
                                $label['match_type']           = LABEL_RELEVANCE_NEUTRAL;
                                $label['last_sync']       = null;
                                $label['require_sync']    = true;
                                $label['backend_description']    = '';
                                $label['frontend_description']    = '';

                                $labelRepo->insert($label);

                                array_push($rows, $title);

                            }

                        }

                    }

                });

                $this->repo->flushLabelListCache();

                return response()->json(['labels' => $rows, 'success' => true] );

            } catch (\Exception $e) {

                return response()->json(['error' => $e->getMessage(), 'file' => $path]);
            }

            return response()->json(['path'=> $path, 'success' => true]);

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

            if ($label) {

                event(new LabelCreated($label));

                return response()->redirectTo('/admin/label');

            } else{

                echo 'problem';
            }
        }

        /**
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function addAnswer(Request $request){

            $data = $request->all();

            $label = $this->repo->findById($data['labelId']);

            $label->answers()->syncWithoutDetaching([$data['answerId']]);


            return response()->json(['label' => $label] );

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

        /**
         * @param $id
         * @return \Illuminate\Http\JsonResponse
         */
        public function sync($id){

            $label = $this->repo->findById($id);

            SyncLabelJob::dispatch($label);

            $this->repo->flushLabelListCache();

            return response()->json(['message'=>'ok'])->setStatusCode(200);

        }


    }
