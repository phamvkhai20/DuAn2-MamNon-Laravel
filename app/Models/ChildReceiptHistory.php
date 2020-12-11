<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildReceiptHistory extends Model
{
    protected $table = 'child_receipt_history';
    protected $fillable =
    [
        'kid_id',    'parent_id',    'attendance',    'name',    'image',    'phone',    'address',    'relationship',    'date',    'confirm'
    ];
}