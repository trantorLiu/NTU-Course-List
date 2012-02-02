<?php
//find cache file
$cachefile = "cache/friends_using_course_list/$user_id.php";
$cachetime = 20 * 60; //20 minutes
//Serve from the cache if it is younger than $cachetime
if (file_exists($cachefile) && (time() - $cachetime	< filemtime($cachefile))) {
	include_once($cachefile);
	echo '<!-- Cached' . date('jS F Y H:i', filemtime($cachefile)) . '-->';

	return;
}
ob_start();	 //start the output buffer
?>
<tr>
	<td>
		<?php
		include_once('mysql_config.php');
		$url = "https://graph.facebook.com/me/friends?access_token={$facebook->getAccessToken()}";
		$result = json_decode(call_fb($url));
		$friends = $result->data;
		$time_before = microtime();
		foreach ($friends as $friend) {
			$query = "SELECT id FROM course_list WHERE user_id = {$friend->id} LIMIT 1";
			$result = mysql_query($query);
			if (mysql_num_rows($result) == 1) {
				echo '<img class="friend" id="friend_' . $friend->id . '" onclick="showList(' . $friend->id . ')" src="http://graph.facebook.com/' . $friend->id . '/picture" title="' . $friend->name . '" />&nbsp;&nbsp;';
			}
		}
		$time_after = microtime();
		$time_used = $time_after - $time_before;
		echo "\n\t<!-- Costed $time_used ms to get user's using-this-app friend list -->\n";

		?>
	</td>
</tr>
<tr>
	<td>
		<hr />
	</td>
</tr>
<tr>
	<td>
		<table id="friendInfo"></table><img alt="" src="images/ajax-loader.gif" id="loaderIcon" />
	</td>
</tr>
<tr>
	<td>
		<table id="listTable"></table>
	</td>
</tr>
<?php
$fp = fopen($cachefile, 'w'); 	//open the cache file for writing
fwrite($fp, ob_get_contents());	//save the contents of output buffer to the file
fclose($fp);	//close the file
ob_end_flush();		//send the output to the browser
?>


