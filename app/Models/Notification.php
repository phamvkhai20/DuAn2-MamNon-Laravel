<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
    protected $table = 'notifications';
    protected $fillable = [
        'range'	,'class_id'	,'receiver_id',	'note',	'title','sender_id','role'
    ];
    public function teacher_sender()
    {
        return $this->beLongsTo(Teacher::class, 'sender_id', 'id');
    }
}
