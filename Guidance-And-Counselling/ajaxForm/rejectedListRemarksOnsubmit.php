<?php session_start();
require_once 'Config.php';
require_once 'timezone.php';

$UpdateRejectlist = $db->query('UPDATE rejectappointment SET Remarks=? ,updated_at=? WHERE ID=?', $_GET["Remarkss"], $time, $_GET["id"]);

// if ($UpdateRejectlist->affectedRows() == 1)
// {
//
// }


$studentData = $db->query('SELECT * FROM rejectappointment ')->fetchAll();

foreach ($studentData as $data) :
    echo '<tr style="">
            <td>'.$data['Employee_ID'].'</td>
            <td>'.$data['Student_Name'].'</td>
            <td>'.$data['Remarks'].'</td>


            <td style="" id="TDbutton">

                <a href="#" onclick="putSomeRemarks('.$data["ID"].',';
                echo "'modalRemarks'";
                echo ' );" class="btn btn-warning" style="background-color: #ffc266"><i class="bi bi-pencil-fill"></i></a>
                <a href="Rejectedlist.php?id='.$_SESSION['success'].'&DRDelete='.$data['ID'].'" class="btn btn-danger"  style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
            </td>
      </tr>';
endforeach;

 ?>
