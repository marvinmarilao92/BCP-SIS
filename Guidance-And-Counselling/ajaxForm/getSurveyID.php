<?php
  session_start();
  $_SESSION["survey_ID"] = $_GET["srvyID"];
 ?>

 <div class="card text-center">
     <div class="card-header">
       BESTLINK COLLLEGE OF THE PHILIPPINES
     </div>
     <div class="card-body">
       <?php
         require_once 'Config.php';
         $selectKey = $db->query('SELECT survey_ratingScale, survey_title, survey_description, survey_key FROM gac_teachereval WHERE ID =? LIMIT 1', $_SESSION["survey_ID"] )->fetchArray();
         $_SESSION["survey_title"] = $selectKey["survey_title"];
         $_SESSION["survey_ratingScale"] = $selectKey["survey_ratingScale"];
        ?>
       <h5 class="card-title"><?php echo $selectKey["survey_title"]; ?></h5>
       <form>
         <div class="form-row">
             <div class="form-group col-4">
               <input type="text" class="form-control"  disabled id="Teacher_Name" placeholder="Enter Teacher name:" style="border:none; border-bottom: 2px solid #a3a3a3;">
             </div>
             <div class="form-group col-4"></div>
             <div class="form-group col-4">
               <input type="text" class="form-control"  disabled placeholder="Enter  Name:" style="border:none; border-bottom: 2px solid #a3a3a3;">
             </div>
         </div>
        </form>
       <p class="card-text">Direction: <?php echo $selectKey["survey_description"]; ?></p>

       <table class="table table-striped">
         <thead>
           <tr>
             <th scope="col">Questions</th>
             <th scope="col">1</th>
             <th scope="col">2</th>
             <th scope="col">3</th>
             <th scope="col">4</th>
             <th scope="col">5</th>
           </tr>
         </thead>
         <tbody>

           <?php
           require_once 'Config.php';
           $survey = $db->query('SELECT survey_Questions FROM gac_teachereval WHERE survey_key=? ', $selectKey["survey_key"])->fetchAll();
           $a = $b = $c = $d = $e = 1; $_SESSION["radioCount"] = 1;
           foreach ($survey as $data) { ?>
               <tr style="">
                 <form id="mainForm" name="mainForm">
                   <td style="text-align: left;"><?php echo $data["survey_Questions"]; ?></td>

                   <td style="padding: 5px; border: 1px solid #a3a3a3;">
                     <div class="form-check form-check-inline" >
                     <input class="form-check-input" type="radio" name="<?php echo 'response'.$a;?>"  value="100"   >
                    </div>
                   </td>

                   <td style="padding: 5px; border: 1px solid #a3a3a3">
                     <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="<?php echo 'response'.$b;?>"value="85" >
                    </div>
                   </td>

                   <td style="padding: 5px; border: 1px solid #a3a3a3">
                     <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="<?php echo 'response'.$c;?>"  value="50" >
                    </div>
                   </td>

                   <td style="padding: 5px; border: 1px solid #a3a3a3">
                     <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="<?php echo 'response'.$d;?>"  value="35" >
                    </div>
                   </td>

                   <td style="padding: 5px; border: 1px solid #a3a3a3">
                     <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="<?php echo 'response'.$e;?>"  value="15" >
                    </div>
                   </td>
                  </form>
               </tr>
           <?php $a++; $b++; $c++; $d++; $e++; $_SESSION["radioCount"] = $a;} ?>
         </tbody>
         </table>
     </div>
     <div class="modal-footer">
       <a href="#" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="btn btn-secondary " onclick="closeModal();"  data-dismiss="modal">Close</a>
       <a href="#"  class="btn btn-primary" onclick="makeSurvey();">Survey?</a>
     </div>
   </div>
