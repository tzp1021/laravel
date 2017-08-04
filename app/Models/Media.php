<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['id', 'videoId', 'netSource', 'duration', 'title', 'iconUrl', 'description', 'album', 'artist', 'genre', 'timeStamp'];
}
