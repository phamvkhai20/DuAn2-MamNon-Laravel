<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $fillable = ['id', 'meta_key', 'meta_value'];

    // lấy thông tin config
    public static function cfg($meta_key) {
        $cfg = Config::where('meta_key',$meta_key)->first();
        return $cfg->meta_value;
    }

    public static function cfgArr($meta_key) {
        $cfg = Config::where('meta_key',$meta_key)->first();
        return json_decode($cfg->meta_value);
    }

}
