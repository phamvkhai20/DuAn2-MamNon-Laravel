<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactBook extends Model
{
    protected $table = 'contact_book';
    protected $fillable =
    [
        'kid_id',	'teacher_id',	'title'	];
        public function replyToComment()
        {
            return $this->hasMany(ReplyToComments::class, 'contact_book_id', 'id');
        }
  
        
    }