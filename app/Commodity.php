<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = ['name', 'price', 'description', 'activity_id', 'avatar'];

    public function activity() {
        return $this->hasOne('App\Activity', 'id', 'activity_id');
    }
}
