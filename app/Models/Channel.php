<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';

    protected $fillable = ['id', 'type', 'title', 'iconUrl', 'description'];
}
