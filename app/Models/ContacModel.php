<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContacModel extends Model
{
    protected $table ='contact';
    protected $fillable =['contact_name', 'contact_phone', 'contact_email', 'detail'];
}
