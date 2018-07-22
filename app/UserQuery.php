<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuery extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'queries';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ip',
        'is_complete'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function queryAnswers(){

        return $this->hasMany(QueryAnswers::class, 'query_id', 'id');

    }

}
