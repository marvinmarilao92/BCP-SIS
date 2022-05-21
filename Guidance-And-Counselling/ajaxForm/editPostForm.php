<?php
      if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["editPost"]))
      {
        require_once 'Config.php';
        $jobPost = $db->query('SELECT * FROM gac_jobpost WHERE ID=?', $_GET["editPost"] )->fetchAll();
          echo '<div class="form-group col-sm-2" ></div>
                  <div class="form-group col-sm-8" >
                    <div id="errorMessage"></div>
                  </div>
                <div class="form-group col-sm-2" ></div>';
        foreach ($jobPost as $post) { ?>
          <div class="form-row" style="margin-bottom: 20px; ">
            <div class="form-group col-sm-2" ></div>
          <div class="form-group col-sm-8" style="height: 80%;">
            <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
              <div style="padding: 10px; ">
                <h5><a href="#"><b><?php echo $post["Company_Name"] ?></b></a>
                  <span class="float-right" style="" >
                    <div class="dropdown show ">
                        <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#" id="savePost" onclick="saveditForm(<?php echo $post["ID"]; ?>, 'filterPost', 'errorMessage');" >
                                    <i class="bi bi-save2"></i><b> Save Data</b></a>
                          <a class="dropdown-item" href="#" id="voidEdit" onclick="updateCanceled(<?php echo $post["ID"]; ?>, 'filterPost');" >
                                    <i class="bi bi-arrow-return-left"></i> Cancel</a>
                        </div>
                      </div>
                  </span>
                </h5>
            <form>
                 <p>  <span class="text-primary">Job Title: </span>
                          <input  type="text" id="saveJob_Title"   value="<?php echo $post["Job_Title"] ?>" name=""  required class="form-control animate__animated animate__pulse"  >
                       <span class="text-primary"> Job Type: </span>
                          <input  type="text" id="saveJob_Type"   value="<?php echo $post["Job_Type"] ?>" name=""  required class="form-control animate__animated animate__pulse"  >
                 </p>

                  <p> <span class="text-primary"> Description :</span>
                          <textarea id="saveJob_Description"  name=""  rows="5" required class="form-control animate__animated animate__pulse"><?php echo $post["Job_Description"] ?></textarea>
                 </p>

                  <p> <span class="text-primary"> Salary: </span>
                         <input  type="text" id="saveSalary"   value="<?php echo $post["Salary"] ?>" name=""  required class="form-control animate__animated animate__pulse"  >
                 </p>

                  <p> <span class="text-primary"> Work location: </span>
                         <input  type="text" id="saveWork_Location"   value="<?php echo $post["Work_Location"] ?>" name=""  required class="form-control animate__animated animate__pulse"  >
                  <p> <span class="text-primary">  Link: </span>
                         <input  type="text" id="savejob_link"   value="<?php echo $post["job_link"] ?>" name=""  required class="form-control animate__animated animate__pulse"  >
                  </p>
               </form>
              </div>
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($post['job_photo'] ).''; ?>"  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px">
            </div>
          </div>

        <div class="form-group col-sm-2" ></div>
        </div>

      <?php  }?>
<?php } ?>
