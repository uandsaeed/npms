<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @package App
 */
class Question extends Model

{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'updated_by'
    ];

    public function label(){

        return $this->belongsTo('App/Label', 'question_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }


}
