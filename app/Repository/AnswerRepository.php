<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Answers;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;


    /**
     * Class AnswerRepository
     *
     * @package App\Repository
     */
    class AnswerRepository implements IRepository
    {

        public function __construct()
        {

        }

        public function getAll(){

            $data = Cache::tags(['ANSWER_LIST'])
                ->remember('ANSWER_BY_LIST', 10, function () {

//                    return Answers::select('id', 'title')
//                    ->orderBy('updated_at', 'desc')->get();

                });

            return $data;
        }

        public function getAllPaginated($page){


            $data = Cache::tags(['ANSWER_LIST'])
                    ->remember('ANSWER_BY_LIST_'.$page, 10, function () {

//                return Question::with(['createdBy', 'updatedBy'])
//                    ->orderBy('updated_at', 'desc')
//                    ->paginate(10);

            });

            return $data;

        }


        /**
         * @param $data []
         * @return Answers|mixed $question;
         */
        public function insert($data){

            $answer = new Answers();
            $answer->title = $data['title'];
            $answer->question_id = $data['question_id'];
            $answer->sort = (int)$data['sort'];

            $answer->created_by = getAuthUser()->id;
            $answer->updated_by = getAuthUser()->id;

            $answer->save();

            $this->flushQuestionListCache();

            return $answer;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $question = $this->findById($id);

            $question->title = $data['title'];
            $question->sort = $data['sort'];
            $question->updated_by = getAuthUser()->id;

            $question->save();

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

                Cache::forget('ANSWER_BY_ID_'.$id);

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

            $data = Cache::tags(['ANSWER_BY_ID'])->remember('ANSWER_BY_ID_'.$id, 20, function () use($id){
                return Answers::find($id);
            });

            return $data;

        }

        public function flushById($id){

            Cache::tags(['ANSWER_BY_ID'])->flush('ANSWER_BY_ID_'.$id);
        }

        private function flushQuestionListCache(){

            Cache::tags(['ANSWER_LIST'])->flush();
        }
    }