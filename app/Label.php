<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Label
 *
 * @package App
 */
class Label extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'labels';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'back_description',
        'front_description',
        'question_id',
        'last_sync',
        'require_sync',
        'created_by',
        'updated_by'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(){

        return $this->belongsTo(Question::class, 'question_id', 'id');
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
