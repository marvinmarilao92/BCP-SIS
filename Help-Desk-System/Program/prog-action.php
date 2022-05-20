<?php
	if (isset($_POST['key'])) {



		$conn = new mysqli("localhost","root","","sis_db");
		// connection for online server
		//$conn = new mysqli("localhost","u692894633_test","+KoB[b#KI2","u692894633_test_db");

		if ($_POST['key'] == 'getRowData') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT title, shortDesc, longDesc FROM hd_program WHERE id='$rowID'");
			$data = $sql->fetch_array();
			$jsonArray = array(
				'title' => $data['title'],
				'shortDesc' => $data['shortDesc'],
				'longDesc' => $data['longDesc'],
			);

			exit(json_encode($jsonArray));
 		}

		if ($_POST['key'] == 'getExistingData') {
			$start = $conn->real_escape_string($_POST['start']);
			$limit = $conn->real_escape_string($_POST['limit']);

			$sql = $conn->query("SELECT id, title, shortDesc, date FROM hd_program LIMIT $start, $limit");
			if ($sql->num_rows > 0) {
				$response = "";
				while($data = $sql->fetch_array()) {
					$response .= '
						<tr>
							<td>'.$data["id"].'</td>
							<td id="hd_program_'.$data["id"].'">'.$data["title"].'</td>
							<td>'.$data["shortDesc"].'</td>
							<td>'.$data["date"].'</td>
							<td>
								<input type="button" onclick="viewORedit('.$data["id"].', \'edit\')" value="Edit" class="btn btn-outline-warning">
								<input type="button" onclick="viewORedit('.$data["id"].', \'view\')" value="View" class="btn btn-outline-primary">
								<input type="button" onclick="deleteRow('.$data["id"].')" value="Delete" class="btn btn-outline-danger">
							</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('reachedMax');
		}

	
$rowID = $conn->real_escape_string($_POST['rowID']);



		date_default_timezone_set("asia/manila");
		$date = date("Y-m-d h:i:s A",strtotime("+0 HOURS"));
		$title = $conn->real_escape_string($_POST['title']);
		$shortDesc = $conn->real_escape_string($_POST['shortDesc']);
		$longDesc = $conn->real_escape_string($_POST['longDesc']);

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE hd_program SET title='$title', shortDesc='$shortDesc', longDesc='$longDesc' date='$date' WHERE id='$rowID'");
			exit('faqs updated');
		} else {
			//add session
			include('session.php');
			$fname=$verified_session_role; 
				if (!empty($_SERVER["HTTP_CLIENT_IP"])){
					$ip = $_SERVER["HTTP_CLIENT_IP"];
				}elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
					$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				}else{
					$ip = $_SERVER["REMOTE_ADDR"];
					$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
					 $remarks="Faqs has been updated";  
					 //save to the audit trail table
					 mysqli_query($link,"INSERT INTO audit_trail(account_no,action,actor,affected,ip,host,date) VALUES('$verified_session_username','$remarks','$fname','$title','$ip','$host','$date')")or die(mysqli_error($link));
		}
	}


	
	
}
?>