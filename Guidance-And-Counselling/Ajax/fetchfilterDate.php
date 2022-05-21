<?php session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getJobTitle"]))
  {

          echo '<div class="form-row">

            <div class="form-group col-12">
              <select class="form-select  animate__animated animate__bounceIn" aria-label="Default select example" id="Jobdate"
              onchange="enabledButton(this.value,';
              echo " 'submitfilerpost'"; echo')">

                <option selected value="" disabled>Select date and time</option>';

                require_once 'Config.php';
                $fetchpostData = $db->query('SELECT created_at FROM gac_jobpost WHERE Company_Name=?', $_SESSION["companyName"] )->fetchAll();
                foreach ($fetchpostData as $postData)
                {
                  echo '<option value="'.$postData["created_at"].'" >'.$postData["created_at"].'</option>';
                }

          echo'  </select>
                </div>

              </div>';
  }

 ?>
