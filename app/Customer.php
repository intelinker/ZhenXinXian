<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['wxid', 'phone', 'name', 'recommender_id', 'avatar'];

    public function recommender() {
        return $this->hasOne('App\Recommender', 'id', 'recommender_id');
    }
}
