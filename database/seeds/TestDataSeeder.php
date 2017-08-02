<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	$catalogIds = array('__CATALOG_MUSIC__', '__CATALOG_RADIO__', '__CATALOG_TSHOW__');
	$channels = DB::select('select * from whisper_channel_data');
	for($i = 0; $i < count($channels); $i++) {
	   $type = $channels[$i]->channel_type;
	    DB::table('channels')->insert([
		'id' => $channels[$i]->channel_md5,
		'iconUrl' => $channels[$i]->icon_url,
		'catalogId' => $catalogIds[$type - 100],
		'subscribe' => $channels[$i]->subscribe,
	    ]);
	}

	$media = DB::select('select * from whisper_media_data');
        for($i = 0; $i < count($media); $i++) {
            DB::table('media')->insert([
                'id' => $media[$i]->media_md5,
                'videoId' => $media[$i]->youtube_video_id,
                'netSource' => $media[$i]->source_url,
                'duration' => $media[$i]->duration,
		'title' => $media[$i]->title,
		'iconUrl' => $media[$i]->icon_url,
            ]); 
        }

	$channel_media = DB::select('select * from whisper_media_channel_unite_data');
        for($i = 0; $i < count($channel_media); $i++) {
            DB::table('channel_media')->insert([
                'id' => $channel_media[$i]->channel_media_unite_md5,
                'channelId' => $channel_media[$i]->channel_md5,
                'mediaId' => $channel_media[$i]->media_md5,
            ]); 
        }
    }
}


