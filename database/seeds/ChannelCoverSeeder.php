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
#        $path = 'http://ec2-13-126-95-153.ap-south-1.compute.amazonaws.com/cover/';
#        $names = array('cover100001.png', 'cover100002.png', 'cover100003.png', 'cover101000.png', 'cover101001.png', 'cover102000.png', 't-series.png');
#        for($i = 0; $i < count($names); $i++) {
#            $id = substr($names[$i], 5, 11);
#            Channel::where('channel_id', $id)->update(['iconUrl' => $path.$names[$i]]);
#	}
	Channel::updateOrCreate(['id' => 'test'],['channel_id' => '1', 'title' => 'दी कपिल शर्मा शो', 'catalogId' => '100', 'timeStamp' => time()]);
    }

}
