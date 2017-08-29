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
	'versionCode' => 8,
	'versionName' => '1.7',
	'apkUrl' => 'http://feedssource.moment.yirgalab.com/Whisper-webpage-release-1.7-8.apk',
	]);
    }
}
