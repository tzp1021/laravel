<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Channel;
use App\Models\Media;
use App\Models\ChannelMedia;
use App\Models\Keyword;
use App\Models\MediaErr;
use App\Models\Catalog;

class WhisperController extends Controller
{
    public function api(Request $request) {
        $op = $request->input('op');
        $json_param = $request->input('json_param');
        if(strcmp($op, 'getChannelList') == 0) {
            return getChannelList($json_param);
        } else if(strcmp($op, 'getMediaList') == 0) {
            return getMediaList($json_param);
        } else if(strcmp($op, 'getKeywordList') == 0) {
	    return getKeywordList($json_param);
	} else if(strcmp($op, 'getTimeStampList') == 0) {
	    return getTimeStampList($json_param);
	}
    }

    function reportErrId(Request $request) {
        echo $request->id;
	echo '<br>';
	echo $request->msg;
	MediaErr::create(['mediaId' => $request->id, 'msg' => $request->msg]);
    }

}

function getTimeStampList() {
    $catalogs = DB::select('select code as id, timeStamp from catalog');
    $channels = DB::select('select id, timeStamp from channels');
    for($i = 0; $i < count($channels); $i++) {
	$channels[$i]->id = 'CN'.$channels[$i]->id;
    }
    $data = array(
        'timeList' => array_merge($catalogs, $channels),
    );
    $result = array(
        'errCode' => 0,
        'errMsg' => "Succeed",
        'data' => $data,
    );
    return json_encode($result);
}

function getKeywordList($json_param) {
   $keywords = DB::select('select id,keyword from keywords');
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
    $catalog = DB::select('select id from catalog where code = ?', [$param->id]);
    if(count($catalog)) {

    }
    $id = $catalog[0]->id;
    $channels = DB::select('select id,title,iconUrl,description from channels where catalogId = ?', [$id]);
    if(count($channels) <= 0) {

    }
    $num = count($channels);
    for($i = 0; $i < $num; $i++) {
	$channels[$i]->id = 'CN'.$channels[$i]->id;
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
    if(!isset($param->id)|| strlen($param->id) < 3) {
        return paramIllegal();
    }
    $id = substr($param->id, 2);
    $info = DB::select('select id,title,iconUrl,description from channels where id = ?', [$id]);
    if(count($info) <= 0) {
        return returnError(2, "id not exist");
    }
    $info[0]->id = 'CN'.$info[0]->id;
    $media = DB::select('select media.id,netSource,duration,title,iconUrl,description from media join channel_media on media.id = mediaId where channelId = ?', [$id]);
    $num = count($media);
    for($i = 0; $i < $num; $i++) {
	$media[$i]->id = 'MD'.$media[$i]->id;
    }
    $data = array(
        'id' => 'CN'.$id,
        'info' => $info[0],
        'list' => $media,
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
