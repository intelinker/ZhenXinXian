<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['wxid', 'phone', 'name', 'title', 'address', 'avatar', 'visible', 'lat', 'long'];

}
