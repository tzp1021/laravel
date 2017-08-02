<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $splitNull = '0';
        $splitChar = ':';
        $catalogIds = array('__CATALOG_MUSIC__', '__CATALOG_RADIO__', '__CATALOG_TSHOW__');
        $typeCode = array('CL', 'CN', 'MD');
        for($cata = 0; $cata < 3; $cata++) {
            $cataId = $catalogIds[$cata];
            for($channelCount = 1; $channelCount <= 3; $channelCount++) {
                $channelId = $cata * 3 + $channelCount;
                DB::table('channels')->insert([
                    'id' => $channelId,
                    'catalogId' => $cataId,
                    'title' => 'channel title '.$channelCount,
                    'iconUrl' => 'http://img.redocn.com/sheji/20160422/shishangheiseyinlefengmian_6211375.jpg',
                    'description' => 'channel description '.$channelCount,
                ]);
                for($mediaCount = 1; $mediaCount <= 10; $mediaCount++) {
                    DB::table('media')->insert([
                        'id' => $cata * 10 + $mediaCount,
                        'channelId' => $channelId,
                        'netSource' => 'https://www.youtube.com/watch?v=AE-bpVg6oW8',
                        'duration' => 219,
                        'title' => 'media title '.$mediaCount,
                        'iconUrl' => 'http://img.redocn.com/sheji/20160422/shishangheiseyinlefengmian_6211375.jpg',
                        'description' => 'media description '.$mediaCount,
                        'album' => 'album '.$mediaCount,
                        'artist' => 'artist '.$mediaCount,
                        'genre' => 'genre '.$mediaCount,
                    ]);
                }
            }
        }
	for($wordCount = 0; $wordCount < 10; $wordCount++) {
	    DB::table('keywords')->insert([
		'keyword' => 'keyword '.$wordCount,
	    ]);
	}
    }
}

