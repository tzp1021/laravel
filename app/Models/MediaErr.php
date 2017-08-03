<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaErr extends Model
{
    protected $table = 'mediaerr';

    protected $fillable = ['mediaId', 'msg'];
}
