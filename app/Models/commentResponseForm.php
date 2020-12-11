<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commentResponseForm extends Model
{
        
    protected $table = 'comment_response_form';
    protected $fillable =
    [
        'name',
        'id_comment'];
        public function form_comment()
        {
            return $this->beLongsTo(FormComment::class, 'id_comment', 'id');
        }
}
