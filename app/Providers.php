<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Providers extends Model
{
    protected $table = 'providers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name', 'description','company_id'];

}
