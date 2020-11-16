<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
     protected $table ='grades';

    protected $fillable =['id','grade','created_at','updated_at'];

}
