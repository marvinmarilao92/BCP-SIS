
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["selectPost"]))
{

    require_once 'afConfig.php';
    $viewPost = $db->query('SELECT * FROM gac_jobpost WHERE created_at=?', $_GET["selectPost"] )->fetchAll();
    foreach ($viewPost as $post)
    {?>
      <div class="form-row animate__animated animate__bounceIn" style="margin-bottom: 20px; ">
        <div class="form-group col-sm-2" ></div>
      <div class="form-group col-sm-8" style="height: 80%;">
        <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
          <div style="padding: 10px; ">
            <h5><a href="<?php echo $post["job_link"] ?>"><b><?php echo $post["Company_Name"] ?></b></a>
              <span class="float-right" style="" >
                <div class="dropdown show">
                    <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#" id="editPost" onclick="editForm(<?php echo $post["ID"]; ?>, 'filterPost');" ><i class="bi bi-pencil"></i> Edit Data</a>
                      <a class="dropdown-item" href="#"><i class="bi bi-image"></i> Change Photo</a>
                      <a class="dropdown-item" href="#" id="deletePost" onclick="deletePost(<?php echo $post["ID"]; ?>, 'filterPost');" ><i class="bi bi-trash"></i> Delete</a>
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
          <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($post['job_photo'] ).''; ?>"  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px">
        </div>
      </div>

    <div class="form-group col-sm-2" ></div>
    </div>
<?php }} ?>
