<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kids extends Model
{
    protected $table ='kids';
    protected $fillable =
    ["fullname",
        "nickname",
        "avatar",
        "gender",
        "date_of_birth",
        "address",
        "admission_date",
        "class_id",
        "parent_id",
        "status"];
    public function attendance(){
        return $this-> hasMany(Attendace::class,'kid_id','id');
    }
}
