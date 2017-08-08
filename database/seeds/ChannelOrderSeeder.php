<?php

use Illuminate\Database\Seeder;
use App\Models\ChannelOrder;

class ChannelOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chanOrder = array('100000', '100004', '100012', '100011', '100005', '100006', '100007', '100003', '100008', '100009', '100002', '100010', '100001', '101000', '101002', '101001', '101003', '101004', '101005', '101006', '102001', '102000', '102002', '102003', '102004', '102005', '102006', '102007', '102008', '102009');
	$num = count($chanOrder);
	for($i = 0; $i < $num; $i++) {
	    ChannelOrder::updateOrCreate(
		['id' => $chanOrder[$i]],
		['priority' => $num - $i,
	    ]);
	}
    }
}
