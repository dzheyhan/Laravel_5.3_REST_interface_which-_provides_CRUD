<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'model_id', 'movement', 'gender'
    ];


    /**
     * Get the Brands record associated with the watch.
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    /**
     * Get the Model record associated with the watch.
     */
     public function model()
     {
         return $this->belongsTo('App\watch_model');
     }



}
