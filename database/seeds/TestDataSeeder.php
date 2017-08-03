<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Channel;
use App\Models\ChannelMedia;
use App\Models\Keyword;
use App\Models\Media;


class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $channels = DB::select('select * from whisper_channel_data');
        for($i = 0; $i < count($channels); $i++) {
	    $chan = Channel::updateOrCreate([
		'id' => $channels[$i]->channel_md5,
		'sourceUrl' => $channels[$i]->source_url,
		'title' => $channels[$i]->title,
		'iconUrl' => $channels[$i]->icon_url,
		'catalogId' => $channels[$i]->channel_type,
		'subscribe' => $channels[$i]->subscribe,
	    ]);
        }

        $media = DB::select('select * from whisper_media_data');
        for($i = 0; $i < count($media); $i++) {
#            DB::table('media')->insert([
	    $me = Media::updateOrCreate([
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
#            DB::table('channel_media')->insert([
	    $ch_me = ChannelMedia::updateOrCreate([
                'id' => $channel_media[$i]->channel_media_unite_md5,
                'channelId' => $channel_media[$i]->channel_md5,
                'mediaId' => $channel_media[$i]->media_md5,
            ]); 
        }

	for($i = 0; $i < 10; $i++) {
#	    DB::table('keywords')->insert([
	    $kw = Keyword::updateOrCreate([
		'keyword' => 'keyword '.$i,
	    ]);
	}
    }
}


