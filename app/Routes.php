<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Routes extends Model
{
    protected $table = 'routes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id', 'delivery_id','product_id','quantity','customer_id','point_a','point_b','status'];

}
