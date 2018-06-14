<?php
    /**
     * Created by PhpStorm.
     * User: ariful.haque
     * Date: 10/06/2018
     * Time: 2:33 AM
     */

    namespace App\Repository;

    use App\Question;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


    /**
     * Class QuestionRepository
     *
     * @package App\Repository
     */
    class QuestionRepository implements IRepository
    {
//        public $type = null;
//        public $brand = null;

        public function __construct()
        {

//            $this->type = new ProductTypeRepository();
//            $this->brand = new BrandRepository();

        }

        public function getAllPaginated(){

            $records = Question::orderBy('updated_at', 'desc')
                ->paginate(10);

            return $records;

        }


        /**
         * @param $data []
         * @return Question|mixed $question;
         */
        public function insert($data){

            $question = new Question();
            $question->title = $data['title'];
            $question->description = $data['description'];

            $question->created_by = getAuthUser()->id;
            $question->updated_by = getAuthUser()->id;

            $question->save();

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

            $question->title = $data['title'];
            $question->description = $data['description'];

            $question->updated_by = getAuthUser()->id;

            $question->save();

            return $question;

        }

        /**
         * @param $id
         * @return mixed
         */
        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

        /**
         * @param $id
         * @return mixed
         */
        public function findById($id)
        {

            $data = Question::find($id);

            return $data;

        }
    }