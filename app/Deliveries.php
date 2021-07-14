<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Deliveries extends Model
{
    protected $table = 'deliveries';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id', 'status','company_id'];

}
