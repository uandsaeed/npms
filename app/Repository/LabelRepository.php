<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Label;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Log;


    /**
     * Class LabelRepository
     *
     * @package App\Repository
     */
    class LabelRepository implements IRepository
    {

        public function __construct()
        {

        }

        /**
         * @param $page
         * @return mixed
         */
        public function getAllPaginated($page){


            $data = Cache::tags(['LABEL_LIST'])
                ->remember('LABEL_BY_LIST_'.$page, 20, function () {

                    return Label::with(['createdBy', 'updatedBy', 'question', 'products'])
                        ->orderBy('updated_at', 'desc')
                        ->paginate(10);

                });

            return $data;

        }


        /**
         * @param $data []
         * @return Label|mixed $question;
         */
        public function insert($data){

            $label = new Label();
            $label->title = $data['title'];
            $label->description = trim($data['description']);
            $label->keywords = trim($data['keywords']);

            $label->question_id = $data['question_id'];
            $label->back_description = trim($data['backend_description']);
            $label->front_description = trim($data['frontend_description']);

            $label->created_by = getAuthUser()->id;
            $label->updated_by = getAuthUser()->id;

            $label->save();

            Log::info('LabelController::insert success', $label->toArray());

            $this->flushLabelListCache();

            return $label;
        }

        /**
         * @param $data
         * @param $id
         * @return mixed
         */
        public function update($data, $id)
        {

            $label = $this->findById($id);

            $label->title = $data['title'];
            $label->description = $data['description'];
            $label->keywords = $data['keywords'];
            $label->question_id = $data['question_id'];
            $label->back_description = $data['backend_description'];
            $label->front_description = $data['frontend_description'];

            $label->updated_by = getAuthUser()->id;
            $label->save();

            $this->flushLabelListCache();
            Cache::forget('LABEL_BY_ID_'.$id);

            return $label;

        }

        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {

            $label = $this->findById($id);

            if($label){
                $label->delete();

                Cache::forget('LABEL_BY_ID_'.$id);

                $this->flushLabelListCache();

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

            $data = Cache::remember('LABEL_BY_ID_'.$id, 20, function () use($id){
                return Label::find($id);
            });

            return $data;

        }

        /**
         * flushLabelListCache
         */
        public function flushLabelListCache(){

            Cache::tags(['LABEL_LIST'])->flush();
            Log::info('Cache Flush ', ['LABEL_LIST']);

        }
    }