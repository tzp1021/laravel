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
	'versionCode' => 9,
	'versionName' => '1.8',
	'apkUrl' => 'http://feedssource.moment.yirgalab.com/Whisper-webpage-release-1.8-9.apk',
	]);
    }
}
