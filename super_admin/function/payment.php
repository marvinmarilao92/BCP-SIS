<?php

 require_once("../include/config.php");
   
   if(isset($_POST['admcode'])&&isset($_POST['ornumber'])){
    // Object Connection 
        $code = mysqli_real_escape_string($link,trim($_POST["admcode"]));
        $or = mysqli_real_escape_string($link,trim($_POST["ornumber"]));
        $status = "Paid";
				 
     //Check if the student number is registered in the database
     $sql = "SELECT id FROM student_application WHERE id_number = '$code'";
     $result = mysqli_query($link,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $count = mysqli_num_rows($result);
     
     // If the student number isregistered in the database, count must be 1
     if($count == 1) {
       // Prepare an insert statement
       $sql1 = "INSERT INTO cashier (adm_num, or_num) VALUES (?, ?)";

       if($stmt = mysqli_prepare($link, $sql1)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "ss", $code, $or);

         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
           // Records created successfully. Redirect to landing page
           // Prepare an insert statement
           $link->query("UPDATE student_application SET account_status='$status' WHERE id_number='$code'") or die(mysqli_error($link));
           echo ('success');
         } else{
          echo ('failed');
         }
         
       }

       // Close statement
       mysqli_stmt_close($stmt);

       // Close connection
       mysqli_close($link);

     }else {
        echo ('failed');
     }
	}
 ?>


