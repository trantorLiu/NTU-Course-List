<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta name="description" content="給台大學生的選課分享app，快來看看你的同學修了哪些課吧！" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta property="og:title" content="我的選課表" />
	<meta property="og:description" content="給台大學生的選課分享app，快來看看你的同學修了哪些課吧！" />
	<meta property="og:type" content="school" />
	<meta property="og:url" content="http://apps.facebook.com/ntu_course_list/" />
	<meta property="og:image" content="http://www.courselist.tw/images/screenshot50.png" />
	<meta property="og:site_name" content="我的選課表" />
	<meta property="fb:app_id" content="330336366986992" />	
	<title>我的台大選課表</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.url.js"></script>
	
	<style type="text/css">
		body {
			font-family: "Microsoft JhengHei","微軟正黑體";
			width: 740px;
			padding: 0px;
			margin: 0px;
		}
		a {
     	 	 text-decoration: none;
		}
			
		#titleTd {
			-moz-border-bottom-colors: none;
			-moz-border-image: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			background-color: #F5F5F5;
			border-color: #E2A9F3 #ECCEF5 #ECCEF5 #E2A9F3;
			border-right: 1px solid #E2A9F3;
			border-bottom: 1px solid #ECCEF5;
			border-width: 1px;
			border-style: solid;
			margin-bottom: 10px;
		}
		#title {
			font-size: 32px;
			font-weight: bold;
		}
		th {
			text-align: left;
		}
		#menu ul {
     	 	list-style: none outside none;
			padding: 0pt;
			width: 732px;
		}
		#menu li {
     	 	display: inline;
     	 	padding: 2px 10px 1px 2px;
		}
		#menu a {
     	 	 text-decoration: none;
		}
		
		div.fb-like {
			position: relative;
			left: 60px;
		}
		
		table.main {
     	 	text-align: center;
     	 	width: 732px;
		}
		table.main table {
     	 	margin-left: auto;
     	 	margin-right: auto;
		}
		#searchBar td{
			padding: 15px 0px 15px 0px;
		}
		#searchField {
     	 	text-align: right;
     	 	width: 450px;
		}
		input.defaultText {
    		
		}
		input.defaultTextActive {
     	 	color: #A1A1A1;
     	 	font-style: italic;
		}
		#coursePagination {
			text-align: right;
		}
		#coursePagination td{
			padding-right: 30px;
			padding-top: 16px;
		}

		#searchResultTable, #addedTable {
     	 	width: 600px;
    		text-align: left;
		}
		#searchResultTable th {
			text-align: left;
		}
		.courseNameTd {
			width: 150px;
		}
		.timeClassroomTd {
			width: 150px;
		}
		.professorTd {
			width: 100px;
		}
		.idTd {
			width: 100px;
		}
		.buttonTd {
			width: 100px;
		}

		hr {
			background-color: #D2D2D2;
			border: medium none;
			color: #D2D2D2;
			height: 1px;
			width: 600px;
		}

		img.friend {
     	 	 cursor: pointer;
		}
		
		/* course list table design */
		#listTable p {
			padding: 1px 2px 1px 0px;
			font-size: 14px;
			margin: 0 0 0 2px;
			text-align: left;
		}
		#listTable {
			 background: none repeat scroll 0% 0% #F9F5D7;
			 border-collapse: collapse;
			 border-spacing: 0px;
			 border: 0.3em solid #000000;
			 width: 680px;
		}
		#listTable span.addedProfessor {
			color: gray;
			margin-left: 4px;
		}

		#listTable th {
			 -moz-border-bottom-colors: none;
			 -moz-border-image: none;
			 -moz-border-left-colors: none;
			 -moz-border-right-colors: none;
			 -moz-border-top-colors: none;
			 border-color: -moz-use-text-color -moz-use-text-color #000000;
			 border-style: none none solid;
			 border-width: 0px 0px 1px;
			 font-weight: normal;
			 padding: 0.1em 0.5em;
			 text-align: left;
		}

		#listTable td {
			 -moz-border-bottom-colors: none;
			 -moz-border-image: none;
			 -moz-border-left-colors: none;
			 -moz-border-right-colors: none;
			 -moz-border-top-colors: none;
			 border-color: -moz-use-text-color -moz-use-text-color #000000;
			 border-style: none none solid;
			 border-width: 0px 0px 1px;
			 padding: 0.1em 0.5em;
			 max-width: 80px;
			 vertical-align: top;
		}

		#listTable thead th {
			 background-color: #AA0000;
			 color: #FFFFFF;
			 font-weight: bold;
			 text-align: center;
		}

		#listTable th.corner {
			 text-align: left;
		}

		#listTable td.odd {
			 background: none repeat scroll 0% 0% #E8E4C0;
		}
		/* end of course list table design */
		p.guide {
			color: gray;
			font-size: 14px;
		}
		#declare {
			font-size: 11px;
			text-decoration: none;
		}


		.buttons a, .buttons button{
			/*display:block;*/
			/*float:left;*/
			margin:0 7px 0 0;
			background-color:#f5f5f5;
			border:1px solid #dedede;
			border-top:1px solid #eee;
			border-left:1px solid #eee;

			font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
			font-size:12px;
			line-height:130%;
			text-decoration:none;
			font-weight:bold;
			color:#565656;
			cursor:pointer;
			padding:5px 10px 6px 7px; /* Links */
		}
		.buttons button{
			width:auto;
			overflow:visible;
			padding:4px 10px 3px 7px; /* IE6 */
		}
		.buttons button[type]{
			padding:5px 10px 5px 7px; /* Firefox */
			line-height:17px; /* Safari */
		}
		*:first-child+html button[type]{
			padding:4px 10px 3px 7px; /* IE7 */
		}
		.buttons button img, .buttons a img{
			margin:0 3px -3px 0 !important;
			padding:0;
			border:none;
			width:16px;
			height:16px;
		}

		/* STANDARD */

		.buttons button:hover, .buttons a:hover {
			background-color:#dff4ff;
		    border:1px solid #c2e1ef;
		    color:#336699;
		}
		.buttons a:active {
		    background-color:#6299c5;
		    border:1px solid #6299c5;
			color:#fff;
		}

		/* POSITIVE */

		button.positive, .buttons a.positive{
		    color:#529214;
		}
		.buttons a.positive:hover, button.positive:hover {
			background-color:#E6EFC2;
		    border:1px solid #C6D880;
			color:#529214;
		}
		.buttons a.positive:active {
		    background-color:#529214;
			border:1px solid #529214;
		    color:#fff;
		}

		/* NEGATIVE */

		.buttons a.negative, button.negative {
		    color:#d12f19;
		}
		.buttons a.negative:hover, button.negative:hover {
		    background:#fbe3e4;
			border:1px solid #fbc2c4;
			color:#d12f19;
		}
		.buttons a.negative:active {
		    background-color:#d12f19;
			border:1px solid #d12f19;
			color:#fff;
		}	

		/* REGULAR */

		button.regular, .buttons a.regular {
			color:#336699;
		}
		.buttons a.regular:hover, button.regular:hover {
			background-color:#dff4ff;
			border:1px solid #c2e1ef;
			color:#336699;
		}
		.buttons a.regular:active {
			background-color:#6299c5;
			border:1px solid #6299c5;
			color:#fff;
		}
	</style>
	<script type="text/javascript">

		var isDirty = false;
		var msg = '尚未儲存變更，確定離開？';
		var startrec = 0;	//indicate the start enrty while searching course by name
		var lastSearchByName = false;	//true is last search is searched by name
		var itemNumPerPage = 7;

		$(document).ready(function () {
			$("#searchingIcon").hide();
			$("#savingIcon").hide();
			$("#saveDoneIcon").hide();
			$("#loaderIcon").hide();

			$(".defaultText").focus(function(srcc) {
				if ($(this).val() == $(this)[0].title)
				{
					$(this).removeClass("defaultTextActive");
					$(this).val("");
				}
			});
			$(".defaultText").blur(function() {
				if ($(this).val() == "")
				{
					$(this).addClass("defaultTextActive");
					$(this).val($(this)[0].title);
				}
			});
			$(".defaultText").blur();        

			if ($('#searchResultTable tr').length == 1 && $('#addedTable tr').length == 0) {
				$('#searchResultTable').hide();
			}

			window.onbeforeunload = function(){
				if(isDirty){
					return msg;
				}
			};

			//if GET parameter page is view and id is specified,
			//load the user's course list
			if (getURLParameter('page') == 'view' && (viewId = getURLParameter('id')) !== 'null') {
				showList(viewId);
			}
			else if (getURLParameter('page') == 'view') {
				$('hr').hide();
				$('#listTable').hide();
			}


		});

		function getURLParameter(name) {
			return decodeURI(
				(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
			);
		}

		function addCourse(course_id) {
			$("#saveIcon").show();
			$("#saveDoneIcon").hide();
			var course_row = $('#searchResult_' + course_id).children();
			var course_name = course_row.eq(0).text();
			var professor = course_row.eq(2).text();
			var time_classroom = course_row.eq(1).text().split('(');

			for (var i = 0; i < time_classroom.length; i++) {
				var str = time_classroom[i]
				var time = str;
				if (str.search(/\)/) != -1) {
					time = str.slice(str.search(/\)/) + 1);
				}
				var day = time.charAt(0);
				var classes = time.slice(1).split("");
				for (var j = 0; j < classes.length; j++) {
					switch (day) {
					case '一':
						day = 1;
						break;
					case '二':
						day = 2;
						break;
					case '三':
						day = 3;
						break;
					case '四':
						day = 4;
						break;
					case '五':
						day = 5;
						break;
					case '六':
						day = 6;
						$('#saturday').show();
						$('[id^=6-]').show();
						break;
					}
					switch(classes[j]) {
					case '0':
						$('#0').show();
						break;
					case 'A':
						$('#A').show();
						break;
					case 'B':
						$('#B').show();
						break;
					case 'C':
						$('#C').show();
						break;
					case 'D':
						$('#D').show();
						break;
					}
					$('#' + day + '-' + classes[j]).append('<p class="added_' + course_id + '">' + course_name + '<span class="addedProfessor">' + professor + '</span></p>');

				}
			}
			var newRow = $('#searchResult_' + course_id).attr('id', 'addedCourse_' + course_id);
			newButton = newRow.children().eq(4).children().eq(0);

			newButton.attr('class', 'removeCourseButton negative');
			newButton.attr('onclick', 'removeCourse(\'' + course_id + '\')');
			newButton.html('<img src="images/File_delete16.png" alt="" />移除');	//switch button text
			$('#addedTable').append(newRow);

			isDirty = true;
		}
		function removeCourse(course_id) {
			$("#saveIcon").show();
			$("#saveDoneIcon").hide();

			$('#listTable p.added_' + course_id).remove();
			
			var newRow = $('#addedCourse_' + course_id).attr('id', 'searchResult_' + course_id);
		
			newButton = newRow.children().eq(4).children().eq(0);
			newButton.attr('class', 'addCourseButton positive');
			newButton.attr('onclick', 'addCourse(\'' + course_id + '\')');
			newButton.html('<img src="images/File_add16.png" alt="" />加入');	//switch button text
			$('#searchResultTable').append(newRow);

			//hide Saturday column, 0ABCD rows if empty
			hideRareUsed();

			isDirty = true;
		}
		function searchCourse() {
			var query = $('#search').attr('value').trim();
			if (query % 1 != 0) {	//not an integer
				searchCourseByName(query);
			}
			else {
				searchCourseById(query);
			}

		}

		function searchCourseById(query) {
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: "course_id=" + query,
				datatype: "text",
				contentType: "application/x-www-form-urlencoded;charset=utf-8",
				beforeSend: function () {
					$("#searchIcon").hide();
					$("#searchingIcon").show();
				},
				success: function(msg) {
					if (lastSearchByName) {
						$('#searchResultTable').find('tr:gt(0)').remove();
					}
					lastSearchByName = false;
					$("#searchIcon").show();
					$("#searchingIcon").hide();

					$('#searchResultTable').show();
					result_page = $(msg);
					result_row = $('tr:contains(' + query + ')', result_page);
					cells = result_row.children();

					if (!(cells.eq(0).text().trim())) {		//course id not found
						$('#searchResultTable').append('<tr class="noResultTr"><td colspan="5">查無結果</td></tr>');
						return;
					}
					$('tr.noResultTr').remove();

					$('#searchResultTable').append(
						'<tr id="searchResult_' + cells.eq(0).text().trim() + '">'
						+ '<td class="courseNameTd">' + cells.eq(4).text().trim() + '</td>'		//course name
						+ '<td class="timeClassroomTd">' + cells.eq(11).text().trim() + '</td>'	//time & classroom
						+ '<td class="professorTd">' + cells.eq(9).text().trim() + '</td>'		//professor
						+ '<td class="idTd">' + cells.eq(0).text().trim() + '</td>'		//id
						+ '<td class="buttonTd buttons"><button class="addCourseButton positive" onclick=\'addCourse("' + cells.eq(0).text().trim() + '")\'><img src="images/File_add16.png" alt="" />加入</button></td>'
						+ '</tr>'
					);
				},
				error: function(msg) {
					if (lastSearchByName) {
						$('#searchResultTable').find('tr:gt(0)').remove();
					}
					lastSearchByName = false;
					$("#searchIcon").show();
					$("#searchingIcon").hide();
				}
			});
		}
		function searchCourseByName(query, entry) {
			if (!entry) {
				var entry = 0;
			}
			startrec = entry;
			$.ajax({
				type: "GET",
				url: "ajax.php",
				data: "course_name=" + query + "&startrec=" + entry,
				datatype: "text",
				contentType: "application/x-www-form-urlencoded;charset=utf-8",
				beforeSend: function () {
					$("#searchIcon").hide();
					$("#searchingIcon").show();
				},
				success: function(msg) {
					if (lastSearchByName) {
						$('#searchResultTable').find('tr:gt(0)').remove();
					}
					lastSearchByName = true;
					$("#searchIcon").show();
					$("#searchingIcon").hide();

					$('#searchResultTable').show();
					result_page = $(msg);
					result_rows = $('tr:contains(' + query + '):lt(' + itemNumPerPage + ')', result_page);
					if (result_rows.length == 0) {		//course id not found
						$('#searchResultTable').append('<tr class="noResultTr"><td colspan="5">查無結果</td></tr>');
						return;
					}
					$.each(result_rows, function (index, row) {
						cells = $(row).children();

						$('tr.noResultTr').remove();

						$('#searchResultTable').append(
							'<tr id="searchResult_' + cells.eq(0).text().trim() + '">'
							+ '<td class="courseNameTd">' + cells.eq(4).text().trim() + '</td>'		//course name
							+ '<td class="timeClassroomTd">' + cells.eq(11).text().trim() + '</td>'	//time & classroom
							+ '<td class="professorTd">' + cells.eq(9).text().trim() + '</td>'		//professor
							+ '<td class="idTd">' + cells.eq(0).text().trim() + '</td>'		//id
							+ '<td class="buttonTd buttons"><button class="addCourseButton positive" onclick=\'addCourse("' + cells.eq(0).text().trim() + '")\'><img src="images/File_add16.png" alt="" />加入</button></td>'
							+ '</tr>'
						);
					});
					if (result_rows.length == itemNumPerPage) {	//there are more pages
						if (startrec > 0) {
							var preStartrec = (startrec - itemNumPerPage > 0) ? (startrec - itemNumPerPage) : 0;
							var nextStartrec = startrec + itemNumPerPage;
							$('#searchResultTable').append(
								'<tr id="coursePagination">'
								+ '<td colspan="5"><a href="" onclick="searchCourseByName(\'' + query + '\',' + preStartrec + '); return false;">上一頁</a>'
								+ ' | '
								+ '<a href="" onclick="searchCourseByName(\'' + query + '\',' + nextStartrec + '); return false;">下一頁</a></td>'
								+ '</tr>'
							);
						}
						else {
							var nextStartrec = startrec + itemNumPerPage;
							$('#searchResultTable').append(
								'<tr id="coursePagination">'
								+ '<td colspan="5"><a href="" onclick="searchCourseByName(\'' + query + '\',' + nextStartrec + '); return false;">下一頁</a></td>'
								+ '</tr>'
							);
						}
					}
					else if (startrec > 0) {	//there are previous pages
						var preStartrec = (startrec - itemNumPerPage > 0) ? (startrec - itemNumPerPage) : 0;
						$('#searchResultTable').append(
							'<tr id="coursePagination">'
							+ '<td colspan="5"><a href="" onclick="searchCourseByName(\'' + query + '\',' + preStartrec + '); return false;">上一頁</a></td>'
							+ '</tr>'
						);
					}
						
				},
				error: function(msg) {
					if (lastSearchByName) {
						$('#searchResultTable').find('tr:gt(0)').remove();
					}
					lastSearchByName = true;
					$("#searchIcon").show();
					$("#searchingIcon").hide();
				}
			});
		}


		function submitList() {
			var listTableHtml = $('#listTable').html();
			var addedTableHtml = $('#addedTable').html();
			$.ajax({
				type: "POST",
				url: "ajax.php",
				data: "list=" + listTableHtml + '&added=' + addedTableHtml,
				datatype: "html",
				beforeSend: function () {
					$("#saveIcon").hide();
					$("#saveDoneIcon").hide();
					$("#savingIcon").show();
				},
				success: function(msg) {
					isDirty = false;
					$("#saveDoneIcon").show();
					$("#savingIcon").hide();
				},
				error: function(msg) {
					$("#saveDoneIcon").show();
					$("#savingIcon").hide();
				}
			});

		}

		function showList(user_id) {
			$.ajax({
				type: "GET",
				url: "ajax.php",
				data: "id=" + user_id,
				datatype: "html",
				beforeSend: function () {
					$("#loaderIcon").show();

					$('#listTable').children().remove();
					$('#friendInfo').children().remove();
				},
				success: function(msg) {
					$("#loaderIcon").hide();
					$('hr').show();
					$('#listTable').show();

					$('#listTable').append(msg);

					var username = getUsername(user_id);
					$('#friendInfo').append(
						'<tr><td><img src="http://graph.facebook.com/' + user_id + '/picture" />'
						+ '</td><td>' + username + '</td></tr>'
					);

				},
				error: function(msg) {
					$("#loaderIcon").hide();
				}
			});
		}
		function getUsername(user_id) {
			var username;
			$.ajax({
				type: "GET",
				url: "ajax.php",
				data: "get_name_id=" + user_id,
				datatype: "text",
				async: false,
				success: function(msg) {
					username = msg;

				},
				error: function(msg) {
				}
			});
			return username;
		}

		function hideRareUsed() {
			//hide Saturday column and 0ABCD rows
			if ($('#0').find('p').length === 0) {
				$('#0').hide();
			}
			if ($('#A').find('p').length === 0) {
				$('#A').hide();
			}
			if ($('#B').find('p').length === 0) {
				$('#B').hide();
			}
			if ($('#C').find('p').length === 0) {
				$('#C').hide();
			}
			if ($('#D').find('p').length === 0) {
				$('#D').hide();
			}
			if ($('[id^=6-]').find('p').length === 0) {
				$('[id^=6-]').hide();
			}
			if ($('#saturday').find('p').length === 0) {
				$('#saturday').hide();
			}
		}

		function streamPublish(name, caption, description, link, picture){        
			FB.ui({ method : 'feed', 
				name		: name,
				caption		: caption,
				description : description,
				link		: link,
				picture		: picture
			});
		}
		
		function publishStream(){
			streamPublish('我的選課表', '看看你的朋友修了哪些課', '台大學生專用的選課分享app，快把你的選課表分享給facebook上的朋友吧！', '<?php echo $fbconfig['app_url'] . '/index.php?page=view&id=' . $user_id; ?>', '<?php echo $fbconfig['base_url'] . '/images/screenshot.png'; ?>');
		}

		function newInvite(){
			var receiverUserIds = FB.ui({ 
					method : 'apprequests',
						message: "我的選課表-台大學生專用的選課分享app！！",
				},
				function(receiverUserIds) {
					//console.log("IDS : " + receiverUserIds.request_ids);
				}
			);
		}
</script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=330336366986992";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script type="text/javascript" src="http://connect.facebook.net/zh_TW/all.js"></script>

	<script type="text/javascript">
	FB.init({
		appId		: '<?=$fbconfig['app_id']?>',
		cookie		: true, // enable cookies to allow the server to access the session
		xfbml		: true,  // parse XFBML
		channelUrl : 'channel.php'
	});
	</script>
	
	<table class="main">
	<tr>
		<td id="titleTd">
			<div id="menu">
			<ul>
				<li><span id="title">我的<span style="font-size: 20px">台大</span>選課表</span></li>
				<li><a target="_top" href="<?php echo $fbconfig['app_url'] ?>">首頁</a></li>
				<li><a target="_top" href="<?php echo $fbconfig['app_url'] . '/index.php?page=view'; ?>">朋友</a></li>
			</ul>
			</div>
			<p id="message"></p>
		</td>
	</tr>
	<tr>
		<td>
			<div class="fb-like" data-href="http://apps.facebook.com/ntu_course_list/" data-send="true" data-width="450" data-show-faces="true"></div>
		</td>
	</tr>

	<?php include_once($page . '.php'); ?>
	<tr>
		<td>
			<br />
			<a href="" onclick="publishStream(); return false;">分享至塗鴉牆</a>
			|
			<a href="" onclick="newInvite(); return false;">邀請朋友</a>
		</td>
	</tr>
	<tr id="footer">
		<td>
			<p id="declare">Designed by Trantor Liu | Licensed under GNU <a href="http://www.gnu.org/licenses/agpl.txt" target="_blank">AGPL</a> | Fork me on <a href="https://github.com/trantorLiu/NTU-Course-List" target="_blank">GitHub</a></p>
		</td>
	</tr>
	</table>

</body>
</html>
