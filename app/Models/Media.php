<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['id', 'channelId', 'netSource', 'duration', 'title', 'iconUrl', 'description', 'album', 'artist', 'genre'];
}
