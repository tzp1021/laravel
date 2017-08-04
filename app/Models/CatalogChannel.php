<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogChannel extends Model
{
    protected $table = 'catalog_channel';

    protected $fillable = ['id', 'catalogId', 'channelId'];

}
