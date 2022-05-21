<?php session_start();
  require_once  'config.php';
  require_once  'QueryParam.php';

    if (!isset($_SESSION["draftKEY"]))
    {
      $_SESSION["draftKEY"] = $getQP;
      $insert = $db->query('INSERT INTO gac_draftpost (Company_Name
      , Job_Title, Job_Type, Job_Description, Salary, Work_Location, job_link, Post_KEY)  VALUES (?,?,?,?,?,?,?,?)'
      , $_POST["Job_Title"], $_POST["Job_Title"], $_POST["Job_Type"], $_POST["Job_Description"],
       $_POST["Salary"], $_POST["Work_Location"], $_POST["job_link"], $_SESSION["draftKEY"]);

       if ($insert->affectedRows() == 1)
       {

         $jobPost = $db->query('SELECT * FROM gac_draftpost WHERE Post_KEY=?', $_SESSION["draftKEY"] )->fetchAll();
         foreach ($jobPost as $post) { ?>
           <div class="form-row animate__animated animate__bounceInDown" style="margin-bottom: 20px; ">
             <div class="form-group col-sm-2" ></div>
           <div class="form-group col-sm-8" style="height: 80%;">
             <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
               <div style="padding: 10px; ">
                 <h5><a href="<?php echo $post["job_link"] ?>"><b><?php echo $post["Company_Name"] ?></b></a>
                   <span class="float-right" style="" >
                     <div class="dropdown show ">
                         <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="bi bi-three-dots-vertical"></i>
                         </a>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           <a class="dropdown-item" href="#" id="editForm" onclick="editForm(editForm, 'draftPostDetails');" ><i class="bi bi-arrow-return-left"></i> Go back</a>
                  </span>
                 </h5>
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
               <!-- <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($post['job_photo'] ).''; ?>"  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px"> -->
             </div>
           </div>

         <div class="form-group col-sm-2" ></div>
         </div>

      <?php }}
    }
    else
    {
      $udpate = $db->query('UPDATE gac_draftpost SET Company_Name=?
      , Job_Title=?, Job_Type=?, Job_Description=?, Salary=?, Work_Location=?, job_link=? WHERE Post_KEY=?',
      $_POST["Job_Title"], $_POST["Job_Title"], $_POST["Job_Type"], $_POST["Job_Description"],
       $_POST["Salary"], $_POST["Work_Location"], $_POST["job_link"], $_SESSION["draftKEY"]);
      if ($udpate->affectedRows() == 1)
      {

        $draftPost = $db->query('SELECT * FROM gac_draftpost WHERE Post_KEY=?', $_SESSION["draftKEY"] )->fetchAll();
        foreach ($draftPost as $post) { ?>
          <div class="form-row animate__animated animate__bounceInDown" style="margin-bottom: 20px; ">
            <div class="form-group col-sm-2" ></div>
          <div class="form-group col-sm-8" style="height: 80%;">
            <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
              <div style="padding: 10px; ">
                <h5><a href="<?php echo $post["job_link"] ?>"><b><?php echo $post["Company_Name"] ?></b></a>
                  <span class="float-right" style="" >
                    <div class="dropdown show ">
                        <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#" id="editForm" onclick="editForm(editForm, 'draftPostDetails');" ><i class="bi bi-arrow-return-left"></i> Go back</a>
                        </div>
                      </div>
                  </span>
                </h5>
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
              <!-- <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($post['job_photo'] ).''; ?>"  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px"> -->
            </div>
          </div>

        <div class="form-group col-sm-2" ></div>
        </div>

      <?php }}} ?>
