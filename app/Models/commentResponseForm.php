<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commentResponseForm extends Model
{
        
    protected $table = 'comment_response_form';
    protected $fillable =
    [
        'name',
        'comment_id'];
        public function form_comment()
        {
            return $this->belongsTo(FormComment::class, 'comment_id', 'id');
        }
        public function replyToComment()
        {
            return $this->hasMany(ReplyToComments::class, 'response_comment_id', 'id');
        }
     
        
}

