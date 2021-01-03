<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
    protected $table = 'notifications';
    protected $fillable = [
        'range'	,'class_id'	,'receiver_id',	'note',	'title','sender_id','role'
    ];
}
