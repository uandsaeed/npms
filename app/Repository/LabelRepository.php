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


        public function getAllList(){

            $data = Cache::tags(['LABEL_LIST'])
                ->remember('LABEL_LIST_ALL', 60, function () {

                    return Label::orderBy('type')
                        ->orderBy('updated_at', 'desc')
                        ->get();

                });

            return $data;
        }


        /**
         * @param $keyword
         * @param $page
         * @return mixed
         */
        public function search($keyword, $page){

            $data = Cache::tags(['LABEL_SEARCH'])
                ->remember('LABEL_SEARCH_'.str_slug($keyword).'_PAGE_'.$page, 60, function () use($keyword){

                    return Label::where('keywords','like', '%' . $keyword . '%')
                        ->orWhere('title','like', '%' . $keyword . '%')
                        ->orderBy('type')
                        ->orderBy('updated_at', 'desc')
                        ->paginate(15);

                });

            return $data;

        }

        /**
         *
         *
         * @param $keyword
         */
        public function searchAjax($keyword){

            $data = Cache::tags(['LABEL_SEARCH'])
                ->remember('LABEL_SEARCH_'.str_slug($keyword), 60, function () use($keyword){

                    return Label::where('keywords','like', '%' . $keyword . '%')
                        ->orWhere('title','like', '%' . $keyword . '%')
                        ->orderBy('type')
                        ->orderBy('updated_at', 'desc')
                        ->get();

                });

            return $data;

        }

        /**
         * @param $page
         * @return mixed
         */
        public function getAllPaginated($page){

            $data = Cache::tags(['LABEL_LIST'])
                ->remember('LABEL_BY_LIST_'.$page, 60, function () {

                    return Label::with(['createdBy', 'updatedBy', 'question', 'products'])
                        ->orderBy('type')
                        ->orderBy('updated_at', 'desc')
                        ->paginate(15);

                });

            return $data;

        }


        /**
         * @param $data []
         * @return Label|mixed $question;
         */
        public function insert($data){

            $label = new Label();
            $label->title                   = $data['title'];
            $label->description             = trim($data['description']);
            $label->keywords                = trim($data['keywords']);

            $label->type                   = $data['type'];
            $label->match                   = $data['match_type'];
            $label->weight                  = $data['weight'];
            $label->back_description        = trim($data['backend_description']);
            $label->front_description       = trim($data['frontend_description']);

            $label->created_by              = getAuthUser()->id;
            $label->updated_by              = getAuthUser()->id;

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

            $label->title                   = $data['title'];
            $label->description             = $data['description'];
            $label->keywords                = $data['keywords'];
            $label->type                    = $data['type'];
            $label->match                   = $data['match_type'];
            $label->weight                  = $data['weight'];
            $label->back_description        = $data['backend_description'];
            $label->front_description       = $data['frontend_description'];
            $label->updated_by              = getAuthUser()->id;
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
         * @param array  $typeIds
         * @param string $key
         * @return mixed
         */
        public function getKeywordsByType($typeIds = [], $key='1234'){


            $data = Cache::tags(['LABEL_BY_IDS'])->remember('LABEL_BY_IDS_'.$key, 60, function () use($typeIds){

                $keywords = [];

                $labels = Label::whereIn('type', $typeIds)
                    ->orderBy('type')
                    ->get();

                foreach ($labels as $label){
                    $keyword = explode(',', $label->keywords);
                    array_push($keywords, $keyword[0]);
                }

                return $keywords;

            });

            return $data;



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

            Cache::tags(['LABEL_LIST', 'LABEL_SEARCH'])->flush();
            Log::info('Cache Flush ', ['LABEL_LIST']);

        }
    }