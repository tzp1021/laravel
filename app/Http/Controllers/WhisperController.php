<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WhisperController extends Controller
{
    public function api(Request $request) {
        $op = $request->input('op');
        $json_param = $request->input('json_param');
        if(strcmp($op, "getChannelList") == 0) {
            return getChannelList($json_param);
        } else if(strcmp($op, "getMediaList") == 0) {
            return getMediaList($json_param);
        } else if(strcmp($op, "getKeywordList") == 0) {
	    return getKeywordList($json_param);
	}
    }

    function reportErrId(Request $request) {
        echo $request->id;
	echo '<br>';
	echo $request->msg;
	DB::table('mediaerr')->insert(['mediaid' => $request->id, 'msg' => $request->msg]);
    }

}

function getKeywordList($json_param) {
   $keywords = DB::select('select id,word from keywords');
   $data = array( 
        'list' => $keywords,
    );   
    $result = array(
        'errCode' => 0,
        'errMsg' => "Succeed",
        'data' => $data,
    );       
    return json_encode($result);

}

function getChannelList($json_param) {

    $param = json_decode($json_param);
    if(!isset($param->id)) {
        return paramIllegal();
    }
    $id = $param->id;
    $channels = DB::select('select id,title,iconUrl,description from channels where type = ?', [$id]);
    if(count($channels) <= 0) {

    }
    $data = array(
        'id' => $id,
        'list' => $channels,
    );
    $result = array(
        'errCode' => 0,
        'errMsg' => "Succeed",
        'data' => $data,
    );
    return json_encode($result);

}

function getMediaList($json_param) {
    $param = json_decode($json_param);
    if(!isset($param->id)) {
        return paramIllegal();
    }
    $id = $param->id;
    $info = DB::select('select id,title,iconUrl,description from channels where id = ?', [$id]);
    if(count($info) <= 0) {
        return returnError(2, "id not exist");
    }
    $channels = DB::select('select id,netSource,duration,title,iconUrl,description,album,artist,genre from media where channelId = ?', [$id]);
    $data = array(
        'id' => $id,
        'info' => $info[0],
        'list' => $channels,
    );
    $result = array(
        'errCode' => 0,
        'errMsg' => "Succeed",
        'data' => $data
    );
    return json_encode($result);
}

function paramIllegal() {
    return returnError(1, "param illegal");
}

function returnError($code, $msg) {
    $result = array(
        'errCode' => $code,
        'errMsg' => $msg,
    );
    return json_encode($result);
}

function reportErrId(Request $request) {
    echo $request->id;
}
