


        <?php
        require_once 'Config.php';
        session_start();
        $jobPost = $db->query('SELECT * FROM gac_draftpost WHERE Post_KEY=?', $_SESSION["keyPost"])->fetchAll();
        foreach ($jobPost as $post) { ?>
          <div class="form-row" style="margin-bottom: 20px; ">

          <div class="form-group col-sm-12">
            <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
              <div style="padding: 10px; ">
                <h3><a href="<?php echo $post["job_link"] ?>"><b><?php echo $post["Company_Name"] ?></b></a></h3>

              <p>  <span class="text-primary">Job Title: </span> <?php echo $post["Job_Title"] ?>   <br>
                   <span class="text-primary"> Job Type: </span><?php echo $post["Job_Type"] ?>   </p>

              <p> <span class="text-primary"> Description :</span> <?php echo $post["Job_Description"] ?> </p>

              <p> <span class="text-primary"> Salary: </span><?php echo $post["Salary"] ?> </p>
              <p> <span class="text-primary"> Work location: </span> <?php echo $post["Work_Location"] ?> </p>

              <br>
              <p>
              <span class="text-primary">  Link: </span><a href="<?php echo $post["job_link"] ?>"><?php echo $post["job_link"] ?></a>
              </p>
              </div>
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($post['job_photo'] ).''; ?>"  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px">
            </div>

          </div>

        </div>

      <?php

      $_SESSION["Company_Name"]       = $post["Company_Name"];
      $_SESSION["job_link"]           = $post["job_link"];
      $_SESSION["Job_Title"]          = $post["Job_Title"];
      $_SESSION["Job_Type"]           = $post["Job_Type"];
      $_SESSION["Work_Location"]      = $post["Work_Location"];
      $_SESSION["Salary"]             = $post["Salary"];
      $_SESSION["job_photo"]          = "";
      $_SESSION["Job_Description"]    = $post["Job_Description"];

     } ?>
