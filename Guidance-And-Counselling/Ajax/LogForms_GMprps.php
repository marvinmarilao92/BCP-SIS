<?php include 'timezone.php'; session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getFCprps"]))
{
  $_SESSION["Purpose".$_SESSION['success'].""] = $_GET["getFCprps"];
  if ($_GET["getFCprps"] == "Other")
  {
    echo '<div class="form-row" >
      <div class="form-group col-md-8" >
          <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'"  placeholder="Student Name" class="form-control"  >
      </div>
      <div class="form-group col-md-4">
          <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control"  >
      </div>
    </div>

    <div class="form-row" >

      <div class="form-group col-md-4">
          <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'" placeholder="Student Section" class="form-control"  >
      </div>
        <div class="form-group col-md-8" >
          <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'"  placeholder="Student Course" class="form-control"  >
      </div>
    </div>

    <div class="form-row" >
        <div class="form-group col-md-12" >
             <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
             <input type="text" value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'" id="RStudentName" name="dtime" disabled class="form-control"  >
        </div>
    </div>';



    echo '<div class="form-row" >
                <div class="form-group col-md-5" >
                    <select class="form-select  animate__animated animate__jello"  name="formName"  id="RStudentName" onchange="Other(this.value, ';
                    echo "'SLG_ChangeContent'";
                    echo')">

                            <option value="" selected disabled >'.$_SESSION["Purpose".$_SESSION['success'].""].'</option>
                            <option value="Scholarship">Scholarship</option>
                            <option value="Employment">Employment</option>
                            <option value="Transfer">Transfer</option>
                            <option value="BoardExam">BoardExam</option>
                           <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-7" >
                    <input type="text"  id="otherPurpose" name="otherPurpose" required placeholder="Other purpose" class="form-control animate__animated animate__bounceInLeft"  >
                </div>
    </div>

    <div id="Purpose"></div>

    </div>

    <div class="modal-footer">';

    if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
    $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
    {
      echo '<a class="btn btn-info" style="color:white;" onclick="submitGoodmoralOtherLogs(';
      echo "'loadTableLogs'";
      echo');" name="StudentLogs">Time in</a> </div>';
    }
    else
    {
      echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
    }
  }
  else
  {
    echo '<div class="form-row" >
      <div class="form-group col-md-8" >
          <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'"  placeholder="Student Name" class="form-control"  >
      </div>
      <div class="form-group col-md-4">
          <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control"  >
      </div>
    </div>

    <div class="form-row" >

      <div class="form-group col-md-4">
          <input type="text" id="RStudentID" required disabled name="" value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'" placeholder="Student Section" class="form-control"  >
      </div>
        <div class="form-group col-md-8" >
          <input  type="text" id="RStudentName" required disabled name="" value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'"  placeholder="Student Course" class="form-control"  >
      </div>
    </div>

    <div class="form-row" >
        <div class="form-group col-md-12" >
             <label for ="referral" ><span style="font-style: italic;">Time in</span></label>
             <input type="text" value="'.date_format(date_create($time), 'g:ia \o\n l jS F Y').'" id="RStudentName" name="dtime" disabled class="form-control"  >
        </div>
    </div>';

    echo '<div class="form-row" >
                <div class="form-group col-md-12" >
                    <select class="form-select "  name="formName"  id="RStudentName" onchange="Other(this.value, ';
                    echo "'SLG_ChangeContent'";
                    echo')">

                            <option value="" selected disabled >'.$_SESSION["Purpose".$_SESSION['success'].""].'</option>
                            <option value="Scholarship">Scholarship</option>
                            <option value="Employment">Employment</option>
                            <option value="Transfer">Transfer</option>
                            <option value="BoardExam">BoardExam</option>
                            <option value="Other">Other</option>
                    </select>
                </div>

    </div>
    <div id="Purpose"></div>

    </div>

    <div class="modal-footer">';

          if (isset($_SESSION["Student_Course".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]) &&
          $_SESSION["Student_Course".$_SESSION['success'].""] != "No Data Found!" && $_SESSION["Student_ID".$_SESSION['success'].""] != "No Data Found!")
          {
            echo '<a style="color:white;" class="btn btn-info"  onclick="submitGoodmoralLogs(';
            echo "'loadTableLogs'";
            echo');"  name="StudentLogs">Time in</a> </div>';
          }
          else
          {
            echo '<button type="submit" class="btn btn-info"  disabled name="StudentLogs">Time in</button> </div>';
          }
  }
}

 ?>
