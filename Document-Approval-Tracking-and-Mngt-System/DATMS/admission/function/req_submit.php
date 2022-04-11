<?php
session_start();
require_once("../include/config.php");
 // agon date
 $current_year = date("y");
 $key = $_SESSION["login_key"];
if(isset($_POST['submit_req']))
{
   //agun implementation for student number
   $sqll = "SELECT id FROM student_information ORDER BY id DESC Limit 1";
   if($resultt = mysqli_query($link, $sqll)){
     if(mysqli_num_rows($resultt) == 0){
       $student_number = "" . $current_year . "010001";
     }
     else if(mysqli_num_rows($resultt) > 0){
       while($roww = mysqli_fetch_array($resultt)){
         if($roww['id'] < 9){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "01000" . $new_id;
         }
         else if ($roww['id'] == 9){
           $student_number = "" . $current_year . "010010";
         }
         else if ($roww['id'] < 99){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "0100" . $new_id;
         }
         else if ($roww['id'] == 99){
           $student_number = "" . $current_year . "010100";
         }
         else if ($roww['id'] < 999){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "010" . $new_id;
         }
         else if ($roww['id'] == 999){
           $student_number = "" . $current_year . "011000";
         }
         else if ($roww['id'] < 9999){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "01" . $new_id;
         }
         else if ($roww['id'] == 9999){
           $student_number = "" . $current_year . "010000";
         }
         else if ($roww['id'] < 99999){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "0" . $new_id;
         }
         else if ($roww['id'] == 99999){
           $student_number = "" . $current_year . "100000";
         }
         else if ($roww['id'] < 999999){
           $new_id = $roww['id'] + 1;
           $student_number = "" . $current_year . "" . $new_id;
         }
       }
     }
   }
    $reqItem = $_POST['req_item'];
    // echo $reqItem;

    foreach($reqItem as $item)
    {
        // echo $item . "<br>";
        $query = "INSERT INTO datms_studreq(id_number,req) VALUES('$student_number','$item')";
        $query_run = mysqli_query($link, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Success";
        
        // echo '<script>alert("Submitted")</script>';
        header("Location: ../index.php?id='.$key.'");
        // echo'
        // <script type="text/javascript">
        // Swal.fire("Success");
        // document.location.reload(true)//refresh pages
        // </script>
        // ';
    }
    else
    {
        // $_SESSION['status'] = "Data Not Inserted";
        // echo '<script>alert("Failed")</script>';
        $_SESSION['status'] = "Failed";
        header("Location: ../index.php?id='.$key.'");
        // echo'
        // <script type="text/javascript">
        // Swal.fire("Data Not Inserted");
        // document.location.reload(true)//refresh pages
        // </script>
        // ';
    }
}
?>