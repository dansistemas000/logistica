<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['user', 'password','profile_id','company','company_id','level','free_pay'];

}
