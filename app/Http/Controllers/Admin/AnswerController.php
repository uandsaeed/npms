<?php

namespace App\Http\Controllers\Admin;

use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AnswerController
 *
 * @package App\Http\Controllers\Admin
 */
class AnswerController extends Controller
{
    private $repo ;

    public function __construct()
    {
        $this->repo = new AnswerRepository();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request){

        $data = $request->all();

        $result = $this->repo->insert($data);

        return response()->json(['answer' => $result] )->setStatusCode(201);

    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){

        $data = $request->all();

        $result = $this->repo->update($data, $id);

        return response()->json(['answer' => $result] )->setStatusCode(200);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete($id){

        $this->repo->delete($id);

        return response()->json([])->setStatusCode(204);

    }

    /**
     * @param $answerId
     * @param $labelId
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachLabel($answerId, $labelId){

        $answer = $this->repo->findById($answerId);

        $answer->labels()->detach($labelId);

        $questionRepo = new QuestionRepository();

        $questionRepo->flushById($answer->question->id);
        $this->repo->flushById($answerId);

        return response()->json([])->setStatusCode(204);


    }

    /**
     * @param $questionId
     */
    public function getListByQuestionId($questionId){

    }

}
