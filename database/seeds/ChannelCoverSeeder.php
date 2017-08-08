<?php

use Illuminate\Database\Seeder;

use App\Models\Channel;

class ChannelCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'http://ec2-13-126-95-153.ap-south-1.compute.amazonaws.com/cover/';
        $names = array('100001.png', '100002.png', '100003.png', '100004.png', '101000.png', '101001.png', '101003.png', '101004.png', '1010006.png', '102000.png', '102002.png', '102003.png', '102008.jpg', '102009.png');
        for($i = 0; $i < count($names); $i++) {
	    $id = substr($names[$i], 0, 6);
            Channel::where('channel_id', $id)->update(['iconUrl' => $path.$names[$i]]);
	}
    }

}
