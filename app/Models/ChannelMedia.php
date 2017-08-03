<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelMedia extends Model
{
    protected $table = 'channel_media';

    protected $fillable = ['id', 'channelId', 'mediaId'];
}
