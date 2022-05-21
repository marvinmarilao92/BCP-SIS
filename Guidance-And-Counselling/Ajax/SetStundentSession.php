<?php session_start();
 if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["empid"]))
        {
            $key = $_GET["empid"];
            require_once  'Config.php';
            $HasStudentProfile = $db->query("SELECT * FROM student_enrolled WHERE Student_ID = '".$key."' OR Student_Lname = '".$key."'");

            if ($HasStudentProfile -> numRows() == 1)
            {
                $StudentData = $db->query('SELECT * FROM student_enrolled WHERE Student_ID = ? OR Student_Lname = ?', $key, $key)->fetchArray();

                $_SESSION["Student_Course".$_SESSION['success'].""]         = $StudentData["Student_Course"];
                $_SESSION["Student_yrlvl".$_SESSION['success'].""]          = $StudentData["Student_yrlvl"];
                $_SESSION["Student_Section".$_SESSION['success'].""]        = $StudentData["Student_Section"];
                $_SESSION["Student_Gender".$_SESSION['success'].""]         = $StudentData["Student_Gender"];
                $_SESSION["Student_Bdate".$_SESSION['success'].""]          = $StudentData["Student_Bdate"];
                $_SESSION["Student_Address".$_SESSION['success'].""]        = $StudentData["Student_Address"];
                $_SESSION["Student_Nationality".$_SESSION['success'].""]    = $StudentData["Student_Nationality"];
                $_SESSION["Student_Religion".$_SESSION['success'].""]       = $StudentData["Student_Religion"];
                $_SESSION["Student_Status".$_SESSION['success'].""]         = $StudentData["Student_Status"];
                $_SESSION["Student_Name".$_SESSION['success'].""]           = $StudentData["Student_Lname"] .', '. $StudentData["Student_Fname"] .' '. $StudentData["Student_Mname"];
                $_SESSION["Student_ID".$_SESSION['success'].""]             = $StudentData["Student_ID"];
                $_SESSION["Stundet_Img".$_SESSION['success'].""]            = $StudentData["Stundet_Img"];


                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> this credentials "'.$_GET["empid"].'" is currently registered!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';

                echo '
                   <h5>Student Personal Information</h5><br>

                    <div class="form-row" >
                        <div class="form-group col-md-4" >
                            <input  type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Course".$_SESSION['success'].""].'">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Section".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_yrlvl".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Gender".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Bdate".$_SESSION['success'].""].'">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Religion".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Nationality".$_SESSION['success'].""].'">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Status".$_SESSION['success'].""].'">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control animate__animated animate__pulse"  value="'.$_SESSION["Student_Address".$_SESSION['success'].""].'">
                        </div>
                    </div>

                       <br><br><br>
     <h5>Other Information</h5><br>


     <ul class="sidebar-nav" >

               <li class="nav-item">
                   <a class="nav-link collapsed" data-bs-target="#studenthinfo" data-bs-toggle="collapse" href="#" >
                      <span>Student requirement</span><i class="bi bi-chevron-down ms-auto"></i>
                   </a>
                   <ul id="studenthinfo" class="nav-content collapse " >';

                     require_once '../gac_Notif/documentTrackingConfigConnetion.php';
                     $verifyreQDOcs = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID".$_SESSION['success'].""]);
                     if ($verifyreQDOcs->numRows() >= 1)
                     {
                       $stdRequirement = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID".$_SESSION['success'].""])->fetchAll();

                       foreach ($stdRequirement as $docs)
                       {
                         echo '<li style="margin-left: 20px;"><i class="bi bi-arrow-right"> </i>'.$docs["req"].'</li>';
                       }
                     }
                     else
                     {
                       echo '<li style="margin-left: 20px;"> <H6><i class="bi bi-exclamation-circle" style="color:red;"></i> Student information isnt available!</H6></li>';
                     }
                     echo '
                   </ul>
               </li>


               <li class="nav-item">
                   <a class="nav-link collapsed" data-bs-target="#Healthinfo" data-bs-toggle="collapse" href="#" >
                      <span>Health Information</span><i class="bi bi-chevron-down ms-auto"></i>
                   </a>
                   <ul id="Healthinfo" class="nav-content collapse " >
                       <h4>Sample Content</h4>
                   </ul>
               </li>

               <li class="nav-item">
                   <a class="nav-link collapsed" data-bs-target="#Sanction" data-bs-toggle="collapse" href="#" >
                      <span>Sanction Information</span><i class="bi bi-chevron-down ms-auto"></i>
                   </a>
                   <ul id="Sanction" class="nav-content collapse " >
                       <h4>Sample Content</h4>
                   </ul>
               </li>

               <li class="nav-item">
                   <a class="nav-link collapsed" data-bs-target="#councel" data-bs-toggle="collapse" href="#" >
                      <span>Counsel Information</span><i class="bi bi-chevron-down ms-auto"></i>
                   </a>
                   <ul id="councel" class="nav-content collapse " >
                       <h4>Sample Content</h4>
                   </ul>
               </li>
     </ul>';

            }
            else
            {
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Invalid!</strong> this credentials "'.$_GET["empid"].'" is not yet registered!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';?>

                                        <h5>Student Personal Information</h5><br>

                                         <div class="form-row" >
                                                <div class="form-group  col-md-4" >
                                                    <input  type="text"  class="form-control "  value="<?php if(isset($_SESSION["Student_Name".$_SESSION['success'].""])) { echo $_SESSION["Student_Name".$_SESSION['success'].""]; }   ?>">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Course".$_SESSION['success'].""])) { echo $_SESSION["Student_Course".$_SESSION['success'].""]; } ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Section".$_SESSION['success'].""])) { echo $_SESSION["Student_Section".$_SESSION['success'].""]; }  ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_yrlvl".$_SESSION['success'].""])) { echo $_SESSION["Student_yrlvl".$_SESSION['success'].""]; }    ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Gender".$_SESSION['success'].""])) { echo $_SESSION["Student_Gender".$_SESSION['success'].""];}     ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="date" class="form-control  "  value="<?php if(isset($_SESSION["Student_Bdate".$_SESSION['success'].""])) { echo $_SESSION["Student_Bdate".$_SESSION['success'].""]; }   ?>">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Religion".$_SESSION['success'].""])) { echo $_SESSION["Student_Religion".$_SESSION['success'].""]; }  ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Nationality".$_SESSION['success'].""])) { echo $_SESSION["Student_Nationality".$_SESSION['success'].""]; }    ?>">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Status".$_SESSION['success'].""])) { echo $_SESSION["Student_Status".$_SESSION['success'].""];}     ?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control  "  value="<?php if(isset($_SESSION["Student_Address".$_SESSION['success'].""])) { echo $_SESSION["Student_Address".$_SESSION['success'].""]; }  ?>">
                                                </div>
                                            </div>

                                            <br><br><br>
                                            <h5>Other Information</h5><br>


                                            <ul class="sidebar-nav" >

                                                      <li class="nav-item">
                                                          <a class="nav-link collapsed" data-bs-target="#studenthinfo" data-bs-toggle="collapse" href="#" >
                                                             <span>Student requirement</span><i class="bi bi-chevron-down ms-auto"></i>
                                                          </a>
                                                          <ul id="studenthinfo" class="nav-content collapse " >
                                                            <?php
                                                            require_once '../gac_Notif/documentTrackingConfigConnetion.php';
                                                            $verifyreQDOcs = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID".$_SESSION['success'].""]);
                                                            if ($verifyreQDOcs->numRows() >= 1)
                                                            {
                                                              $stdRequirement = $dtmsDB->query('SELECT * FROM datms_studreq WHERE id_number=?', $_SESSION["Student_ID".$_SESSION['success'].""])->fetchAll();

                                                              foreach ($stdRequirement as $docs)
                                                              {
                                                                echo '<li style="margin-left: 20px;"><i class="bi bi-arrow-right"> </i>'.$docs["req"].'</li>';
                                                              }
                                                            }
                                                            else
                                                            {
                                                              echo '<li style="margin-left: 20px;"> <H6><i class="bi bi-exclamation-circle" style="color:red;"></i> Student information isnt available!</H6></li>';
                                                            }
                                                             ?>
                                                          </ul>
                                                      </li>


                                                      <li class="nav-item">
                                                          <a class="nav-link collapsed" data-bs-target="#Healthinfo" data-bs-toggle="collapse" href="#" >
                                                             <span>Health Information</span><i class="bi bi-chevron-down ms-auto"></i>
                                                          </a>
                                                          <ul id="Healthinfo" class="nav-content collapse " >
                                                              <h4>Sample Content</h4>
                                                          </ul>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link collapsed" data-bs-target="#Sanction" data-bs-toggle="collapse" href="#" >
                                                             <span>Sanction Information</span><i class="bi bi-chevron-down ms-auto"></i>
                                                          </a>
                                                          <ul id="Sanction" class="nav-content collapse " >
                                                              <h4>Sample Content</h4>
                                                          </ul>
                                                      </li>

                                                      <li class="nav-item">
                                                          <a class="nav-link collapsed" data-bs-target="#councel" data-bs-toggle="collapse" href="#" >
                                                             <span>Counsel Information</span><i class="bi bi-chevron-down ms-auto"></i>
                                                          </a>
                                                          <ul id="councel" class="nav-content collapse " >
                                                              <h4>Sample Content</h4>
                                                          </ul>
                                                      </li>
                                            </ul>
        <?php  }} ?>
