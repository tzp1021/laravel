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
        $typeName = array('Music', 'Radio', 'TalkShow');
        for($type = 0; $type < 3; $type++) {
            $typeId = $typeName[$type].$splitChar.$splitNull.$splitChar.$splitNull;
            for($channelCount = 1; $channelCount <= 3; $channelCount++) {
                $channelId = $typeName[$type].$splitChar.$channelCount.$splitChar.$splitNull;
                DB::table('channels')->insert([
                    'id' => $channelId,
                    'type' => $typeId,
                    'title' => 'channel title '.$channelCount,
                    'iconUrl' => 'http://img.redocn.com/sheji/20160422/shishangheiseyinlefengmian_6211375.jpg',
                    'description' => 'channel description '.$channelCount,
                ]);
                for($mediaCount = 1; $mediaCount <= 10; $mediaCount++) {
                    DB::table('media')->insert([
                        'id' => $typeName[$type].$splitChar.$channelCount.$splitChar.$mediaCount,
                        'channelId' => $channelId,
                        'netSource' => 'https://www.youtube.com/watch?v=PMivT7MJ41M',
                        'duration' => 0,
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
    }
}
