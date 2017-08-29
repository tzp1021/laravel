<?php

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaOfflineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen('/home/ubuntu/media.txt', 'r') or die('Unable to open file!');
        $medias = array();
        while(!feof($file)) {
            $line = fgets($file);
            $strs = preg_split('/[\s]+/', $line);
            array_push($medias, $strs[10]);
        }
        fclose($file);
	echo count($medias);
	for($i = 0; $i < count($medias); $i++) {
	    $me = Media::where('videoId', $medias[$i])->update(['online' => 0]);
	    
	}
    }
}
