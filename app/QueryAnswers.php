<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueryAnswers extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'query_answers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'query_id',
        'answers_id',
        'question_id',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userQuery(){

        return $this->belongsTo(UserQuery::class, 'query_id', 'id');

    }
}
