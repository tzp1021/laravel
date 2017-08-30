<?php

use Illuminate\Database\Seeder;

class GotitMorningTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen('/home/ubuntu/morning.txt', 'r') or die('Unable to open file!');
        $topics = array();
        while(!feof($file)) {
            $line = fgets($file);
            $strs = preg_split('/[\s]+/', $line);
            array_push($topics, $strs[0]);
        }
        fclose($file);
        echo count($topics);
	for($i = 0; $i < count($topics); $i++) {
	    DB::insert("insert into morning_topics (id) values (?)", [$topics[$i]]);
	}
	
	$file = fopen('/home/ubuntu/noon.txt', 'r') or die('Unable to open file!');
        $topics1 = array();
        while(!feof($file)) {
            $line = fgets($file);
            $strs = preg_split('/[\s]+/', $line);
            array_push($topics1, $strs[0]);
        }
        fclose($file);
        echo count($topics1);
        for($i = 0; $i < count($topics1); $i++) {
            DB::insert("insert into noon_topics (id) values (?)", [$topics1[$i]]);
        }

	$file = fopen('/home/ubuntu/night.txt', 'r') or die('Unable to open file!');
        $topics2 = array();
        while(!feof($file)) {
            $line = fgets($file);
            $strs = preg_split('/[\s]+/', $line);
            array_push($topics2, $strs[0]);
        }
        fclose($file);
        echo count($topics2);
        for($i = 0; $i < count($topics2); $i++) {
            DB::insert("insert into night_topics (id) values (?)", [$topics2[$i]]);
        }

    }
}
