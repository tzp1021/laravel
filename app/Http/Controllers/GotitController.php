<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GotitController extends Controller
{
    public function api(Request $request) {
        $op = $request->input('op');
        $json_param = $request->input('json_param');
        if(strcmp($op, 'getMorningNoonNightList') == 0) {
            return getMorningNoonNightList($json_param);
	}
    }
}

function getMorningNoonNightList($json_param) {
    $morning = DB::select('select id from morning_topics');
    for($i = 0; $i < count($morning); $i++) {
	$morning[$i]->type = 1;
    }
    $noon = DB::select('select id from noon_topics');
    for($i = 0; $i < count($noon); $i++) {
        $noon[$i]->type = 2;
    }
    $night = DB::select('select id from night_topics');
    for($i = 0; $i < count($night); $i++) {
        $night[$i]->type = 3;
    }
    $data = array(
        'topicIdList' => array_merge($morning, $noon, $night),
    );
    $result = array(
        'errCode' => 0,
        'errMsg' => "Succeed",
        'data' => $data,
    );
    return json_encode($result);
}
