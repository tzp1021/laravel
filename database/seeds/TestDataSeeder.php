<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Channel;
use App\Models\ChannelMedia;
use App\Models\Keyword;
use App\Models\Media;
use App\Models\Catalog;
use App\Models\CatalogChannel;


class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	$catalogCode = array('100' => '__CATALOG_MUSIC__', '101' => '__CATALOG_RADIO__', '102' => '__CATALOG_TSHOW__');
	while(list($key, $value) = each($catalogCode)) {
	    $cata = Catalog::updateOrCreate([
		'id' => $key,
		'code' => $value,
		'timeStamp' => time(),
	    ]);
	}

        $channels = DB::select('select * from whisper_channel_data');
        for($i = 0; $i < count($channels); $i++) {
	    $chan = Channel::updateOrCreate([
		'id' => $channels[$i]->channel_md5,
		'channel_id' => $channels[$i]->channel_id,
		'sourceUrl' => $channels[$i]->source_url,
		'title' => $channels[$i]->title,
		'iconUrl' => $channels[$i]->icon_url,
		'catalogId' => $channels[$i]->channel_type,
		'subscribe' => $channels[$i]->subscribe,
		'timeStamp' => time(),
	    ]);

#	    $ca = Catalog::where('id', $channels[$i]->channel_type)->update(['timeStamp', time()]);
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
		'timeStamp' => time(),
            ]); 
        }

        $channel_media = DB::select('select * from whisper_media_channel_unite_data');
        for($i = 0; $i < count($channel_media); $i++) {
#	    DB::transaction(function() {
		$ch_me = ChannelMedia::updateOrCreate([
        	    'id' => $channel_media[$i]->channel_media_unite_md5,
                    'channelId' => $channel_media[$i]->channel_md5,
	            'mediaId' => $channel_media[$i]->media_md5,
                ]);
#		$ch = Channel::where('id', $channel_media[$i]->channel_md5)->update(['timeStamp', time()]);
#		$chan = Channel::find($channel_media[$i]->channel_md5);
#		$ca = Catalog::where('id', $chan->catalogId)->update(['timeStamp', time()]);
#	    });
        }

	$keywords = array('Vidya Vox', 'Justin Biber', 'Sonu Nigam', 'Ed Sheeran', 'Arijit Singh', 'Mere Rashke Qamar', 'Despacito', 'Mi Gente', 'Qismat', 'Voodoo Song');
	for($i = 0; $i < count($keywords); $i++) {
	    $kw = Keyword::updateOrCreate([
		'keyword' => $keywords[$i],
	    ]);
	}
    }
}


