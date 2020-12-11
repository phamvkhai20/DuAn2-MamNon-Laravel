<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyToComments extends Model
{
    protected $table = 'reply_to_comments';
    protected $fillable =
    ['comment_id',	'response_comment_id',	'contact_book_id'	];
}
