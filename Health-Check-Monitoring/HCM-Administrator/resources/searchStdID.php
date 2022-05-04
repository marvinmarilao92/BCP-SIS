<?php
  
  include('../security/newsource.php');

    $table_name = "student_information";
    $result = SelectQuery($table_name, $conn, $_POST["searchID"]);
    if(mysqli_num_rows($result) > 0){
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);

      echo '
      
        <form action="resources/add_records.php" method="POST" enctype="multipart/form-data">
          <div class="card p-4">
            <div class"card-body">
              <div class="row"> 
                <div class="col-sm-6">
                  <fieldset class="border p-4">
                    <legend class="float-none w-auto p-2">Personal Information:</legend>
                    <div class="row g-2">
                      <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" value="'.$row['id_number'].'" disabled>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" value="'.$row['lastname'].', '.$row['firstname'].' '.$row['middlename'].'" disabled>
                      </div>
                    </div>
                    <div class="row g-2 pt-3">
                      <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" value="'.$row['course'].'-'.$row['section'].'" disabled>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" value="'.$row['year_level'].'" disabled>
                      </div>
                    </div>
                    <div class="row g-2 pt-3">
                      <div class="col-md-6">
                        <input type="text" class="form-control form-control-lg" value="'.$row['gender'].'" disabled>
                      </div>
                    </div>
                  </fieldset>
                  <div class="row p-4">
                    <div class="alert alert-info fade show text-center" role="alert">
                      <strong>Remarks and Upload file on the Action section</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <fieldset class="border p-2">
                    <legend class="float-none w-auto p-2">Account Information</legend>
                    <div class="row"> 
                      <h5>'.$row['account_status'].', '.$row['stud_date'].'</h5>
                    </div>
                  </fieldset>
                  <fieldset class="border p-2">
                  <legend class="float-none w-auto p-2">Action</legend>
                    <div class="row">
                      <div class="w-auto"> Remarks </div>
                    </div>
                    <div class="row p-4">
                      <textarea class="form-control" name="remarks" rows="3"></textarea>
                    </div>
                  <div class="row">
                    <div class="col d-flex justify-content-center">
                      <label for="uploadPDF"><i class="btn btn-primary ri-attachment-line">&nbspUpload</i><label>
                      <input type="file" name="upload" id="uploadPDF" class="form-control form-control-md" onchange="getImage(this.value)" style="display: none; visibility:none;">
                    </div>
                  </div>
                  <h5 id="display-name"  class="row d-flex justify-content-center"></h5>
                </div>  
                <div class="text-center p-4">
                  <input type="hidden" name = "fullname" value = "'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'">
                  <input type="hidden" name="id_number" value="'. $row['id_number'].'">
                  <input type="hidden" name="tablename" value="hcms_studen_records">
                  <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                  <button type="close" class="btn btn-secondary">close</button>
                </div>
              </div>
            </div>
          </div>  
      </form>';

    } else {
      
      echo '
      <div class="row p-4">
      <div class="alert alert-danger">No Records Found</div>
      </div>';
    }
    mysqli_free_result($result);
  ?>        