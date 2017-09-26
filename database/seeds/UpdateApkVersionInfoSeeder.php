<?php

use Illuminate\Database\Seeder;
use App\Models\ApkVersion;

class UpdateApkVersionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApkVersion::create([
    	'versionCode' => 14,
	    'versionName' => '1.13.14',
    	'apkUrl' => 'http://feedssource.moment.yirgalab.com/Whisper-webpage-release-1.13.14-14.apk',
	    ]);
    }
}
