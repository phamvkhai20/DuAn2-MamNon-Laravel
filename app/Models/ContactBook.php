<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactBook extends Model
{
    protected $table = 'contact_book';
    protected $fillable =
    [
        'kid_id',	'teacher_id',	'health','class_id','date', 'eating','learning'];
        public function replyToComment()
        {
            return $this->hasMany(ReplyToComments::class, 'contact_book_id', 'id');
        }
        public function kid()
        {
            return $this->belongsTo(Kid::class, 'kid_id', 'id');
        }
        
        
    }
