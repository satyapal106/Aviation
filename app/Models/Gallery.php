<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [
        'images',
    ];

    protected $casts = [
        'images' => 'array'
    ];
    public $timestamps = true;
    protected $table = 'galleries';
}
