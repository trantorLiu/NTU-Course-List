	<tr>
		<td id="searchTd">
			<table>
			<tr id="searchBar">
				<td>
					<div class="buttons">
					<form id="searchForm" onsubmit="searchCourseById(); return false;">
					<span id="searchField">
						<input class="defaultText" title="台大課程流水號" type="text" size="23" name="search" id="search" />
					</span>
					<span id="searchButtonTd">
						<button id="searchButton" class="regular" name="submit" type="submit"><img id="searchingIcon" src="images/ajax-loader.gif" /><img id="searchIcon"alt="" src="images/Search16.png" />&nbsp;Search</button>
					</span>
					</form>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<table id="searchResultTable">
						<tr>
							<th class="courseNameTd">課程</th>
							<th class="timeClassroomTd">時間&amp;教室</th>
							<th class="professorTd">教授</th>
							<th class="idTd">流水號</th>
							<th class="buttonTd"></th>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><hr /></td>
			</tr>
			<tr>
				<td>
					<table id="addedTable">
					<?php					
					require_once('mysql_config.php');
					$query = "SELECT * FROM course_list WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
					$result = mysql_query($query) or die ('Insert course list error: ' . mysql_error());
					if (($row = mysql_fetch_assoc($result)) != NULL) {
						echo $row['added_table'];
					}
					?>
					</table>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
		<?php
		if ($row['list_table']) {
			echo '<table id="listTable">' . $row['list_table'] . '</table>';
		}
		else { ?>
		<table id="listTable">
			<thead>
			<tr>
				<th class="corner"></th>
				<th>星期一</th>
				<th>星期二</th>
				<th>星期三</th>
				<th>星期四</th>
				<th>星期五</th>
				<th id="saturday">星期六</th>
			</tr>
			</thead>
			<tr id="0">
				<th>0</th>
				<td class="odd" id="1-0"></td>
				<td id="2-0"></td>
				<td class="odd" id="3-0"></td>
				<td id="4-0"></td>
				<td class="odd" id="5-0"></td>
				<td id="6-0"></td>
			</tr>
			<tr>
				<th>1</th>
				<td class="odd" id="1-1"></td>
				<td id="2-1"></td>
				<td class="odd" id="3-1"></td>
				<td id="4-1"></td>
				<td class="odd" id="5-1"></td>
				<td id="6-1"></td>
			</tr>
			<tr>
				<th>2</th>
				<td class="odd" id="1-2"></td>
				<td id="2-2"></td>
				<td class="odd" id="3-2"></td>
				<td id="4-2"></td>
				<td class="odd" id="5-2"></td>
				<td id="6-2"></td>
			</tr>
			<tr>
				<th>3</th>
				<td class="odd" id="1-3"></td>
				<td id="2-3"></td>
				<td class="odd" id="3-3"></td>
				<td id="4-3"></td>
				<td class="odd" id="5-3"></td>
				<td id="6-3"></td>
			</tr>
			<tr>
				<th>4</th>
				<td class="odd" id="1-4"></td>
				<td id="2-4"></td>
				<td class="odd" id="3-4"></td>
				<td id="4-4"></td>
				<td class="odd" id="5-4"></td>
				<td id="6-4"></td>
			</tr>
			<tr>
				<th>@</th>
				<td class="odd" id="1-@"></td>
				<td id="2-@"></td>
				<td class="odd" id="3-@"></td>
				<td id="4-@"></td>
				<td class="odd" id="5-@"></td>
				<td id="6-@"></td>
			</tr>
			<tr>
				<th>5</th>
				<td class="odd" id="1-5"></td>
				<td id="2-5"></td>
				<td class="odd" id="3-5"></td>
				<td id="4-5"></td>
				<td class="odd" id="5-5"></td>
				<td id="6-5"></td>
			</tr>
			<tr>
				<th>6</th>
				<td class="odd" id="1-6"></td>
				<td id="2-6"></td>
				<td class="odd" id="3-6"></td>
				<td id="4-6"></td>
				<td class="odd" id="5-6"></td>
				<td id="6-6"></td>
			</tr>
			<tr>
				<th>7</th>
				<td class="odd" id="1-7"></td>
				<td id="2-7"></td>
				<td class="odd" id="3-7"></td>
				<td id="4-7"></td>
				<td class="odd" id="5-7"></td>
				<td id="6-7"></td>
			</tr>
			<tr>
				<th>8</th>
				<td class="odd" id="1-8"></td>
				<td id="2-8"></td>
				<td class="odd" id="3-8"></td>
				<td id="4-8"></td>
				<td class="odd" id="5-8"></td>
				<td id="6-8"></td>
			</tr>
			<tr>
				<th>9</th>
				<td class="odd" id="1-9"></td>
				<td id="2-9"></td>
				<td class="odd" id="3-9"></td>
				<td id="4-9"></td>
				<td class="odd" id="5-9"></td>
				<td id="6-9"></td>
			</tr>
			<tr id="A">
				<th>A</th>
				<td class="odd" id="1-A"></td>
				<td id="2-A"></td>
				<td class="odd" id="3-A"></td>
				<td id="4-A"></td>
				<td class="odd" id="5-A"></td>
				<td id="6-A"></td>
			</tr>
			<tr id="B">
				<th>B</th>
				<td class="odd" id="1-B"></td>
				<td id="2-B"></td>
				<td class="odd" id="3-B"></td>
				<td id="4-B"></td>
				<td class="odd" id="5-B"></td>
				<td id="6-B"></td>
			</tr>
			<tr id="C">
				<th>C</th>
				<td class="odd" id="1-C"></td>
				<td id="2-C"></td>
				<td class="odd" id="3-C"></td>
				<td id="4-C"></td>
				<td class="odd" id="5-C"></td>
				<td id="6-C"></td>
			</tr>
			<tr id="D">
				<th>D</th>
				<td class="odd" id="1-D"></td>
				<td id="2-D"></td>
				<td class="odd" id="3-D"></td>
				<td id="4-D"></td>
				<td class="odd" id="5-D"></td>
				<td id="6-D"></td>
			</tr>			
		</table>
		<script>hideRareUsed();</script>

		<?php } ?>
		</td>
	</tr>
	<tr>
		<td class="buttons">
			<p class="guide">若包含週六或晨間、夜間課程，選課表將自動擴充。</p>
			<button class="negative" id="submitList" onclick="submitList()" style="width: 160px; border: 1px solid black;">
				<img src="images/Save16.png" alt="" id="saveIcon"/><img src="images/ajax-loader.gif" alt="" id="savingIcon" /><img src="images/Accept16.png" alt="" id="saveDoneIcon" />儲存</button>
		</td>
	</tr>
