<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Question;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class QuestionRepository
     *
     * @package App\Repository
     */
    class QuestionRepository implements IRepository
    {

        public function __construct()
        {

        }

        public function getAll(){

            $data = Cache::tags(['QUESTION_LIST'])
                ->remember('QUESTION_BY_LIST', 10, function () {

                    return Question::select('id', 'title')
                    ->orderBy('updated_at', 'desc')->get();

                });

            return $data;
        }

        public function getAllPaginated($page){


            $data = Cache::tags(['QUESTION_LIST'])
                    ->remember('QUESTION_BY_LIST_'.$page, 10, function () {

                    return Question::with(['createdBy', 'updatedBy', 'answers'])
                        ->orderBy('is_active', 'desc')
                        ->orderBy('sort', 'asc')
                        ->orderBy('updated_at', 'desc')
                        ->paginate(10);

            });

            return $data;

        }


        /**
         * @param $data []
         * @return Question|mixed $question;
         */
        public function insert($data){

            $question = new Question();
            $question->title = $data['title'];
            $question->description = $data['description'];
            $question->sort = $data['sort'];
            $question->is_active = $data['is_active'];

            $question->created_by = getAuthUser()->id;
            $question->updated_by = getAuthUser()->id;

            $question->save();

            $this->flushQuestionListCache();

            return $question;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $question = $this->findById($id);

//            dd($data);

            $question->title = $data['title'];
            $question->description = $data['description'];
            $question->sort = $data['sort'];
            $question->is_active = isset($posts['is_active']) ? $posts['is_active']: 0;

            $question->updated_by = getAuthUser()->id;

            $question->save();

            $this->flushById($id);
            $this->flushQuestionListCache();

            return $question;

        }

        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {
            // TODO: Implement delete() method.

            $question = $this->findById($id);

            if($question){
                $question->delete();

                Cache::forget('QUESTION_BY_ID_'.$id);

                $this->flushQuestionListCache();

                return true;
            } else{
                return false;
            }
        }

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id)
        {

//            dd('hee');
            $data = Cache::tags(['QUESTION_BY_ID'])->remember('QUESTION_BY_ID_'.$id, 20, function () use($id){
//                @todo add with
                return Question::find($id);
            });

            return $data;

        }

        /**
         * @param $id
         */
        public function flushById($id){

            Cache::tags(['QUESTION_BY_ID'])->flush(['QUESTION_BY_ID_'.$id]);
        }

        private function flushQuestionListCache(){

            Cache::tags(['QUESTION_LIST'])->flush();
        }
    }