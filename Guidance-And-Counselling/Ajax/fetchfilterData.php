<?php session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getCompany"]))
  {
        $_SESSION["companyName"] = $_GET["getCompany"];
          echo '<div class="form-row">

            <div class="form-group col-12">
              <select class="form-select animate__animated animate__bounceIn" aria-label="Default select example" id="filterJob" onchange="takeJob(this.value,';
              echo " 'DateandTime'"; echo'), closedButton(this.value,';
              echo "'submitfilerpost'";
              echo')">
                <option selected value="" disabled>Select Job Title</option>';

                require_once 'Config.php';
                $fetchpostData = $db->query('SELECT Job_Title FROM gac_jobpost WHERE Company_Name=?', $_GET["getCompany"] )->fetchAll();
                foreach ($fetchpostData as $postData)
                {
                  echo '<option value="'.$postData["Job_Title"].'" >'.$postData["Job_Title"].'</option>';
                }

          echo'  </select>
                </div>

              </div>';

          echo '<div id="DateandTime"></div>';
  }



 ?>
