<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    protected $table = 'grades';
    protected $fillable = ['grade'];
    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'grade_id', 'id');
    }
}
