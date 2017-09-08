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
    	'versionCode' => 10,
	    'versionName' => '1.9.6',
    	'apkUrl' => 'http://feedssource.moment.yirgalab.com/Whisper-webpage-release-1.9.6-10.apk',
	    ]);
    }
}
