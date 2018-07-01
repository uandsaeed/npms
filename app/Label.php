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


    protected $dates = [
        'last_sync'
    ];

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
        'weight',
        'match',
        'last_sync',
        'require_sync',
        'created_by',
        'updated_by'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(){

        return $this->belongsToMany(Product::class, 'product_label_pivot',
            'label_id', 'product_id');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(){

        return $this->belongsTo(Question::class, 'question_id', 'id');
    }


    public function getWeightAttribute($value){
        return getLabelWeight($value);
    }

    public function getMatchAttribute($value){
        return getLabelRelevance($value);
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
