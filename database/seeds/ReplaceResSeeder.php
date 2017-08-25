<?php

use Illuminate\Database\Seeder;

use App\Models\Channel;

class ReplaceResSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	$file = fopen('/home/ubuntu/whisper.txt', 'r') or die('Unable to open file!');
	$map = array();
	while(!feof($file)) {
	    $line = fgets($file);
	    $strs = preg_split('/[\s]+/', $line);
	    $map[$strs[0]] = $strs[1];
	}
	fclose($file);
        $path = 'http://ec2-13-126-95-153.ap-south-1.compute.amazonaws.com/cover/';
	$channels = DB::select('select * from channels');
	for($i = 0; $i < count($channels); $i++) {
	    if(strpos($channels[$i]->iconUrl, $path) === 0) {
		$fileName = substr($channels[$i]->iconUrl, strlen($path));
		Channel::find($channels[$i]->id)->update(['iconUrl' => $map[$fileName]]);
	    }
	}
    }
}
