<?php
include_once('fbmain.php');

if ($user_id) {
	if (isset($_REQUEST['course_id'])) {	//search course by id
		$course_id = (int)$_REQUEST['course_id'];

		//find cache file
		$cachefile = "cache/courses/$course_id.txt";
		$cachetime = 7 * 24 * 60 * 60; //7 days
		//Serve from the cache if it is younger than $cachetime
		if (file_exists($cachefile) && (time() - $cachetime
			< filemtime($cachefile))) 
		{
			echo file_get_contents($cachefile);
			echo '<!-- Cached' . date('jS F Y H:i', filemtime($cachefile)) . '-->';

			exit;
		}

		
		$url = "http://nol.ntu.edu.tw/nol/coursesearch/search_result.php";
		$field_string = "?cstype=4&current_sem=100-2&csname=$course_id";
		
		//open connection
		$session = curl_init();

		curl_setopt($session, CURLOPT_URL, $url . $field_string);

		//Don't return HTTP headers. Do return the contents of the call
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_FOLLOWLOCATION, false); 
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		//execute post
		$response = curl_exec($session);
		$response_utf8 = iconv("Big5", "UTF-8", $response);

		$pos_of_course_id = strripos($response_utf8, $course_id . '</td>');
		$course_table_start = strripos($response_utf8, '<table', $pos_of_course_id - strlen($response));
		$course_table_end = stripos($response_utf8, '</table>', $pos_of_course_id);
		$course_table = substr($response_utf8, $course_table_start, $course_table_end - $course_table_start + 5);

		//echo $response;
		echo $course_table;
		//close connection
		curl_close($session);

		file_put_contents($cachefile, $course_table);		//cache response html
	}
	elseif (isset($_REQUEST['course_name'])) {	//search course by name
		$course_name_utf8 = $_REQUEST['course_name'];
		$course_name_big5 = iconv("UTF-8", "Big5", $_REQUEST['course_name']);
		$course_name_escape = rawurlencode($course_name_big5);

		$url = "http://nol.ntu.edu.tw/nol/coursesearch/search_result.php";
		if (isset($_REQUEST['startrec'])) {
			$startrec = (int)$_REQUEST['startrec'];
			$field_string = "?cstype=1&current_sem=100-2&csname=$course_name_escape&startrec=$startrec";
		}
		else {
			$field_string = "?cstype=1&current_sem=100-2&csname=$course_name_escape";
		}
		
		//open connection
		$session = curl_init();

		curl_setopt($session, CURLOPT_URL, $url . $field_string);

		//Don't return HTTP headers. Do return the contents of the call
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_FOLLOWLOCATION, false); 
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		//execute post
		$response = curl_exec($session);
		$response_utf8 = iconv("Big5", "UTF-8", $response);

		$pos_of_course_name = stripos($response_utf8, 'course_id');
		$course_table_start = strripos($response_utf8, '<table', $pos_of_course_name - strlen($response));
		$course_table_end = stripos($response_utf8, '</table>', $pos_of_course_name);
		$course_table = substr($response_utf8, $course_table_start, $course_table_end - $course_table_start + 8);

		echo $course_table;
		//close connection
		curl_close($session);
	}
	elseif (isset($_REQUEST['list']) && isset($_REQUEST['added'])) {
		require_once('mysql_config.php');

		//escape and trim the input html parameters
		$list_html = '';
		foreach(preg_split("/((\r?\n)|(\r\n?))/", $_REQUEST['list']) as $line){
			$list_html .= trim($line);
		}
		$list_html = mysql_real_escape_string($list_html);

		$added_html = '';
		foreach(preg_split("/((\r?\n)|(\r\n?))/", $_REQUEST['added']) as $line){
			$added_html .= trim($line);
		}
		$added_html = mysql_real_escape_string($added_html);
		

		$query = "INSERT INTO course_list (user_id, list_table, added_table) VALUES ($user_id, '$list_html', '$added_html') ON DUPLICATE KEY UPDATE list_table='$list_html', added_table='$added_html', time=NOW(), save_count=save_count+1";
		mysql_query($query) or die ('Insert course list error: ' . mysql_error());


	}
	elseif (isset($_REQUEST['id'])) {	//get user firend's course list
		include_once('mysql_config.php');
		$user_id = (int)$_REQUEST['id'];
		$query = "SELECT list_table FROM course_list WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
		$result = mysql_query($query) or die ('Query course list error: ' . mysql_error());
		$row = mysql_fetch_assoc($result);
		echo $row['list_table'];
	}
	elseif (isset($_REQUEST['get_name_id'])) {	//return username whose id is get_name_id
		echo get_username((int)$_REQUEST['get_name_id']);
	}
	elseif (isset($_REQUEST['get_last_save_time_id'])) {
		include_once('mysql_config.php');
		$user_id = (int)$_REQUEST['get_last_save_time_id'];
		$query = "SELECT time FROM course_list WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
		$result = mysql_query($query) or die ('Query course list error: ' . mysql_error());
		$row = mysql_fetch_assoc($result);
		echo $row['time'];
	}	

}

?>

