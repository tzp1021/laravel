<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelOrder extends Model
{
    protected $table = 'channel_order';

    protected $fillable = ['id', 'priority'];

}
