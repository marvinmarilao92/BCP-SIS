<?php

        require_once 'Config.php';
        $studentInfo = $db->query('SELECT * FROM rejectappointment WHERE ID = ?', $_GET['URUpdate'])->fetchArray();
        $_SESSION["RejStudent_Name"] = $studentInfo["Student_Name"];
        $_SESSION["RejStudent_ID"]  = $studentInfo["Student_ID"];

 ?>



 <div class="form-row" >
   <div class="form-group col-md-6" >
       <input  type="text" style="  color: black;
         border-left: 3px solid #5e5e5e;
         border-right: 3px solid #5e5e5e;
         border-radius: 10px;" name="StudentName"   disabled class="form-control animate__animated animate__bounceInRight"  value="<?php if(isset($_SESSION["RejStudent_Name"])) { echo $_SESSION["RejStudent_Name"]; }   ?>">
   </div>
   <div class="form-group col-md-6">
       <input type="text" style="  color: black;
         border-left: 3px solid #5e5e5e;
         border-right: 3px solid #5e5e5e;
         border-radius: 10px;"
         name="StudentID" disabled class="form-control animate__animated animate__bounceInLeft"  value="<?php if(isset($_SESSION["RejStudent_ID"])) { echo $_SESSION["RejStudent_ID"]; } ?>">
   </div>
</div>

<div class="form-row" >
   <div class="form-group col-md-12" >
       <textarea id="Remarkss" style="  color: black;
         border-left: 3px solid #5e5e5e;
         border-right: 3px solid #5e5e5e;
         border-radius: 10px;"
         required class="form-control animate__animated animate__zoomInUp"  rows="5" ></textarea>
   </div>
</div>

<div class="modal-footer">
    <a href="#" class="btn btn-primary" onclick="submitRemarks(<?php echo $studentInfo["ID"]; ?>, 'lodaNewData');">Submit</a>
</div>
