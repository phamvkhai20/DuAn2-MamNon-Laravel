<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormComment extends Model
{
    protected $table = 'form_comment';
    protected $fillable =
    [
        'title'	];
        public function comment_response_forms()
        {
            return $this->hasMany(commentResponseForm::class,'comment_id', 'id');
        }
    
    }
