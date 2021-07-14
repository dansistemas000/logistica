<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name','phone','email','postal_code','address','company_id'];

}
