<?php

use Illuminate\Database\Seeder;
use App\Models\Channel;
use App\Models\ChannelMedia;
use App\Models\Keyword;
use App\Models\Media;
use App\Models\Catalog;
use App\Models\CatalogChannel;

class SyncDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$path = 'http://ec2-13-126-95-153.ap-south-1.compute.amazonaws.com/cover/';
        $channels = DB::select('select * from whisper_channel_data');
        for($i = 0; $i < count($channels); $i++) {
            $chan = Channel::find($channels[$i]->channel_md5);
            if($chan != NULL) {
                $coverUrl = $channels[$i]->icon_url;
                if(strpos($chan->iconUrl, $path) === 0) {
                    $coverUrl = $chan->iconUrl;
                }
                Channel::find($channels[$i]->channel_md5)->update([
                'sourceUrl' => $channels[$i]->source_url,
                'title' => $channels[$i]->title,
                'iconUrl' => $coverUrl,
                'subscribe' => $channels[$i]->subscribe,
                ]);
            } else {
                $chan = Channel::create([
                'id' => $channels[$i]->channel_md5,
                'channel_id' => $channels[$i]->channel_id,
                'sourceUrl' => $channels[$i]->source_url,
                'title' => $channels[$i]->title,
                'iconUrl' => $channels[$i]->icon_url,
                'catalogId' => $channels[$i]->channel_type,
                'subscribe' => $channels[$i]->subscribe,
                'online' => false,
                'timeStamp' => time(),
                ]);
            }
        }

	$media = DB::select('select * from whisper_media_data');
        for($i = 0; $i < count($media); $i++) {
            $me = Media::find($media[$i]->media_md5);
            if($me != NULL) {
                Media::find($media[$i]->media_md5)->update([
                'videoId' => $media[$i]->youtube_video_id,
                'netSource' => $media[$i]->source_url,
                'duration' => $media[$i]->duration,
                'title' => $media[$i]->title,
                'iconUrl' => $media[$i]->icon_url,
                ]);
            } else {
                Media::create([
                'id' => $media[$i]->media_md5,
                'videoId' => $media[$i]->youtube_video_id,
                'netSource' => $media[$i]->source_url,
                'duration' => $media[$i]->duration,
                'title' => $media[$i]->title,
                'iconUrl' => $media[$i]->icon_url,
                'online' => true,
                'timeStamp' => time(),
                ]);
            }
        }

	$channel_media = DB::select('select * from whisper_media_channel_unite_data');
        for($i = 0; $i < count($channel_media); $i++) {
            $ch_me = ChannelMedia::find($channel_media[$i]->channel_media_unite_md5);
            if($ch_me == NULL) {
                ChannelMedia::create([
                'id' => $channel_media[$i]->channel_media_unite_md5,
                'channelId' => $channel_media[$i]->channel_md5,
                'mediaId' => $channel_media[$i]->media_md5,
                ]);
                $ch = Channel::find($channel_media[$i]->channel_md5);
                if($ch != NULL) {
                    Channel::find($ch->id)->update(['timeStamp' => time()]);
                    Catalog::find($ch->catalogId)->update(['timeStamp' => time()]);
                }
            }
        }

    }
}
