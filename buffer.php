<?php 
include_once('mysql_config.php');
$access_token = $facebook->getAccessToken();

$query = 'SELECT counter FROM buffer_count WHERE user_id = ' . $user_id;
$result = mysql_query($query);

if (!$result) {
	die('Select from buffer_count error');
}
else {
	$result = mysql_fetch_assoc($result);

	if (!$result) {		//no data before, this's a new user
		//TODO
		return;
	}
	else {
		$counter = $result['counter'];
	}
	
	if ($counter > 0) {

		//fetch buffer
		$query = "SELECT love_id, TIMESTAMPDIFF(DAY, time, NOW()) AS time FROM love_buffer WHERE user_id = $user_id AND pop_out_time IS NULL ORDER BY id DESC LIMIT $counter";
		$buffer_result = mysql_query($query) or die('Query love buffer error: ' . mysql_error());
		if (!$buffer_result) {
			exit;
		}
		$buffer = array();	//includes all users' id in the buffer
		while ($hold = mysql_fetch_assoc($buffer_result)) {
			$buffer[] = $hold;
		}

		foreach($buffer as $love_person) { ?>
		<script>
			buffer(<?php echo $love_person['love_id'] ?>, <?php echo "'{$love_person['time']}'" ?>);
		</script>
		<?php }
	}
	else {
		echo '<p id="emptyBufferP">Your buffer is empty</p>';
	}
}
?>


