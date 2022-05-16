<!-- //range.php -->
<?php
include_once("../include/conn.php");
if(isset($_POST["From"], $_POST["to"]))
{
    //set the correct timezone
    date_default_timezone_set('Asia/Manila');
	$time = date("H:i:s",strtotime("+0 HOURS"));
    $newFrom = $_POST["From"]." ".$time;
    $newTo = $_POST["to"]." ".$time;
    $result = '';
    $query = "SELECT *,LEFT(middlename,1) FROM student_information WHERE stud_date BETWEEN '".$newFrom."' AND '".$newTo."' ORDER BY stud_date DESC";
    $sql = mysqli_query($conn, $query);
    $result .='
    <table class="table table-bordered" id="StudentsTable">
        <thead>
            <tr>
            <th WIDTH="10%">Student No.</th>
            <th WIDTH="25%">Name</th>
            <th scope="col">Program</th>                    
            <th >Status</th>
            <th scope="col">Phone No.</th>
            <th scope="col">Email</th>
            <th scope="col" WIDTH="15%">Date Enrolled</th>
            </tr>
        </thead>';
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $adm_id = $row['id'];
            $adm_no =$row['id_number'];
            $adm_fname = $row['firstname'];
            $adm_lname = $row['lastname'];        
            $adm_mname = $row['LEFT(middlename,1)'];
            $adm_program = $row['course'];
            $adm_contact = $row['contact'];
            $adm_email = $row['email'];
            $date = $row['stud_date'];
            $adm_as = $row['account_status'];

            $result .='
            <tbody>
            <tr>
                <td data-label="Student No.">'.$adm_no.'</td>
                <td data-label="Name" WIDTH="25%">'.$adm_lname.', '.$adm_fname.' '.$adm_mname.'.'.'</td>
                <td data-label="Program">'.$adm_program.'</td>
                <td data-label="Status">'.$adm_as.'</td>
                <td data-label="No.">'.$adm_contact.'</td>
                <td data-label="Email">'.$adm_email.'</td>
                <td data-label="Date:">'.$date.'</td>
            </tr>  
            </tbody>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="5">No Data Found</td>
        </tr>';
    }
    $result .='</table>';
    echo $result;
}
?>