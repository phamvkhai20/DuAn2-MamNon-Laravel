<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyToComments extends Model
{
    protected $table = 'reply_to_comments';
    protected $fillable =
    ['comment_id',	'response_comment_id',	'contact_book_id','note'	];

    public function response_comment()
    {
        return $this->belongsTo(commentResponseForm::class,'response_comment_id', 'id');
    }
    public function comment()
    {
        return $this->belongsTo(FormComment::class,'comment_id', 'id');
    }
    public function contact_book()
    {
        return $this->beLongsTo(ContactBook::class,'contact_book_id', 'id');
    }
}
