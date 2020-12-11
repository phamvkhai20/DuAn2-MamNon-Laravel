<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactBook extends Model
{
    protected $table = 'contact_book';
    protected $fillable =
    [
        'kid_id',	'teacher_id',	'title'	];
    }
