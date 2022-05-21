


<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">

              <div class="form-row" >
                <div class="form-group col-md-4">
                    <input type="text" id="CSID" name="StudentID" required disabled class="form-control animate__animated animate__bounceInLeft"  value="<?php if(isset($_SESSION["Student_ID".$_SESSION['success'].""])) { echo $_SESSION["Student_ID".$_SESSION['success'].""]; } ?>">
                </div>
                <div class="form-group col-md-8" >
                    <input  type="text" id="CSname" name="StudentName" required  disabled class="form-control animate__animated animate__bounceInRight"  value="<?php if(isset($_SESSION["Student_Name".$_SESSION['success'].""])) { echo $_SESSION["Student_Name".$_SESSION['success'].""]; }   ?>">
                </div>
            </div>

            <div class="form-row" >
                <div class="form-group col-md-12" >
                    <input  type="text" id="CName" name="CounselorName" required   placeholder="Enter counselor name" class="form-control animate__animated animate__bounceInLeft" >
                </div>
            </div>


    <div class="form-row" >
                 <div class="form-group col-md-12" >
                    <label for ="CounselorForm" ><span style="font-style: italic;">Insert Counseling Form (GF-5)</span></label>
                    <input id="CForm" type="file" name="CounselorForm" required   class="form-control animate__animated animate__bounceInRight" >
                </div>
      </div>


</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info" name="InsertForm">Insert Form</button>
</form>
</div>




<?php





if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['CounselorForm']['tmp_name'])) {
        require_once "dbImage/Imagedb.php";
        $imgData =addslashes(file_get_contents($_FILES['CounselorForm']['tmp_name']));
        $imageProperties = getimageSize($_FILES['CounselorForm']['tmp_name']);

        $sql = "INSERT INTO counseledlist(imageType ,	Counsel_Forms	, request_Key)
        VALUES('{$imageProperties['mime']}', '{$imgData}' , '{$_SESSION["Request_KEY".$_SESSION["success"].""]}')";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        if(isset($current_id)) {
          // header("Location: listImages.php");
        }
      }
    }
 ?>
