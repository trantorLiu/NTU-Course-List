<?php
include_once('facebook.php');

$fbconfig['app_id'] = 'APP ID HERE';
$fbconfig['app_secret'] = 'APP SECRET HERE';


$fbconfig['app_url'] = 'APP URL HERE';	//origin: http://apps.facebook.com/ntu_course_list
$fbconfig['base_url'] = 'APP BASE URL HERE';	//origin: http://www.courselist.tw

if (isset($_GET['code'])) {
	header("Location: {$fbconfig['app_url']}");
	exit;
}

if (isset($_GET['request_ids'])) {
	//track the user
}
$user = null;

$config = array(
	'appId'		 => $fbconfig['app_id'],
	'secret'	 => $fbconfig['app_secret'],
	'fileUpload' => false,
	'cookie'	 => true
);

$facebook = new Facebook($config);
$login_url = $facebook->getLoginUrl(array(
	//for now, the default info is enough
));

$user_id = $facebook->getUser();

if ($user_id) {
	try {
		$user_profile = $facebook->api('/me');
	}
	catch (FacebookApiException $e) {
		debug($e);
		$user_id = null;
	}
}

if (!$user_id) {
	echo "<script type='text/javascript'>top.location.href = '$login_url';</script>";
}

function call_fb($url)
{
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	));

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
function get_username($id) {
	$url = "https://graph.facebook.com/$id";
	$ret_json = call_fb($url);
	$user = json_decode($ret_json, true);
	return $user['name'];
}
function get_user_id_by_path($path) {
	global $facebook;
	$access_token = $facebook->getAccessToken();
	$url = "https://graph.facebook.com$path?access_token=$access_token";
	$ret_json = call_fb($url);
	return $ret_json;
}

function debug($e) {
	echo '<pre>';
	print_r($e);
	echo '</pre>';
}
?>




