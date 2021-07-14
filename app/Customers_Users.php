<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customers_Users extends Model
{
    protected $table = 'customers_users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['customer_id', 'user_id'];

}
