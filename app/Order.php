<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'commodity_id', 'distributor_id', 'activity_id', 'delivered_time'];

    public function customer() {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function commodity() {
        return $this->hasOne('App\Commodity', 'id', 'commodity_id');
    }

    public function distributor() {
        return $this->hasOne('App\Distributor', 'id', 'distributor_id');
    }

    public function activity() {
        return $this->hasOne('App\Activity', 'id', 'activity_id');
    }
}
