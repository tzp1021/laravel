<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Media;

class InitMediaAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mediaAlbum = DB::select('select mediaId, title from channels join channel_media on channels.id = channel_media.channelId');
	for($i = 0; $i < count($mediaAlbum); $i++) {
	    Media::where('id', $mediaAlbum[$i]->mediaId)->update(['album' => $mediaAlbum[$i]->title]);
	}
    }
}
