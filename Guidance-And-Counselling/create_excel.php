<?php
	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=Student-Logs.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	require_once 'Config.php';

	$output = "";
	$X="";

	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
						<th>ID</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Section</th>
            <th>Student Course</th>
            <th>Year Graduate</th>
            <th>Visit Purpose</th>
            <th>Type of Logs</th>
            <th>Student IN</th>
            <th>Student OUT</th>
					</tr>
				<tbody>
		";
// ORDER BY created DESC
    $StudentLogs = $db->query('SELECT * FROM gac_logsdata ')->fetchAll();
    foreach ($StudentLogs as $fetch)
    {

		$output .= "
					<tr>
						<td>".++$X."</td>
						<td>".$fetch['Student_ID']."</td>
						<td>".$fetch['Student_Name']."</td>
						<td>".$fetch['Student_Section']."</td>
            <td>".$fetch['Student_Course']."</td>
            <td>".$fetch['Year_Graduate']."</td>
            <td>".$fetch['Visit_Purpose']."</td>
            <td>".$fetch['LogsType']."</td>
            <td>".date_format(date_create($fetch['created']), 'g:ia \o\n l jS F Y')."</td>
            <td>".date_format(date_create($fetch['created']), 'g:ia \o\n l jS F Y')."</td>
					</tr>
		";
		}

		$output .="
				</tbody>

			</table>
		";

		echo $output;
	}








	if(ISSET($_POST['exportCounseling'])){
		$output .="
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Counselor Name</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Course</th>
						<th>Year Level</th>
            <th>Testing Status</th>
						<th>Remarks</th>
					</tr>
				<tbody>
		";
// ORDER BY created DESC
    $StudentLogs = $db->query('SELECT * FROM counseledlist ')->fetchAll();
    foreach ($StudentLogs as $fetch)
    {

		$output .= "
					<tr>
						<td>".++$X."</td>
						<td>".$fetch['Couselor_Name']."</td>
						<td>".$fetch['Student_ID']."</td>
						<td>".$fetch['Student_Name']."</td>

            <td>".$fetch['Student_Course']."</td>
            <td>".$fetch['Student_yrlvl']."</td>
            <td>".$fetch['Testing_Status']."</td>
						<td>".$fetch['Remarks']."</td>
					</tr>
		";
		}

		$output .="
				</tbody>

			</table>
		";

		echo $output;
	}





?>
