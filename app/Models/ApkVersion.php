<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApkVersion extends Model
{
    protected $table = 'version_info';

    protected $fillable = ['versionCode', 'versionName', 'apkUrl'];
}
