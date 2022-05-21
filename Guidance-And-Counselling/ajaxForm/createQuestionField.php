<?php session_start();


if (!isset($_GET["removeQfld"])){
  if (!isset($_SESSION["addQuestion"])) { $_SESSION["addQuestion"] = 1; ?>
  <div class="form-row">
      <div class="form-group col-2"></div>
        <div class="form-group col-7" >
          <label for="survey_title"><i>Create question # <?php echo $_SESSION["addQuestion"]; ?></i></label>

          <input type="text"
           value="<?php
           if (isset($_SESSION["QUESTION"][0]) && $_SESSION["QUESTION"][0] != null)
           {echo $_SESSION["QUESTION"][0];}
           else
           {echo "";}
           ?>"
           required class="form-control"
           oninput="<?php echo "Question".$x."(this.value);"; ?>"
           placeholder="Enter Survey question" >

        </div>
        <div class="form-group col-1">
          <label for="survey_title" style="color:transparent;">s</label>
          <a class="btn btn-danger form-control" style="color:white";  onclick="removeNewQuestionField('Questions');" ><i class="bi bi-trash"></i></a>
        </div>
      <div class="form-group col-2"></div>
  </div>

<?php  }












  else
  {
    $_SESSION["addQuestion"] += 1;
    for ($x = 1; $x<= $_SESSION["addQuestion"]; $x++)
    {   if ($x<$_SESSION["addQuestion"])  {  ?>
        <div class="form-row">
            <div class="form-group col-2"></div>
              <div class="form-group col-8" >
                <label for="survey_title"><i>Create question # <?php echo $x; ?></i></label>

                <input type="text"
                 value="<?php
                 if (isset($_SESSION["QUESTION"][$x-1]) && $_SESSION["QUESTION"][$x-1] != null)
                 echo $_SESSION["QUESTION"][$x-1];
                 else
                 echo "";
                 ?>"
                 required class="form-control"
                 oninput="<?php echo "Question".$x."(this.value);"; ?>"
                 placeholder="Enter Survey question" >


              </div>
            <div class="form-group col-2"></div>
        </div>
      <?php  } else { ?>

        <div class="form-row">
            <div class="form-group col-2"></div>
              <div class="form-group col-7" >
                <label for="survey_title"><i>Create question # <?php echo $x; ?></i></label>

                <input type="text"
                 value="<?php
                 if (isset($_SESSION["QUESTION"][$x-1]) && $_SESSION["QUESTION"][$x-1] != null)
                 echo $_SESSION["QUESTION"][$x-1];
                 else
                 echo "";
                 ?>"
                 required class="form-control"
                 oninput="<?php echo "Question".$x."(this.value);"; ?>"
                 placeholder="Enter Survey question" >

              </div>
              <div class="form-group col-1">
                <label for="survey_title" style="color:transparent;">s</label>
                <a class="btn btn-danger form-control" style="color:white";  onclick="removeNewQuestionField('Questions');" ><i class="bi bi-trash"></i></a>
              </div>
            <div class="form-group col-2"></div>
        </div>
<?php    }}
  }}
 ?>




 <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["removeQfld"])) {
   $_SESSION["addQuestion"] -= 1;
   for ($x = 1; $x<= $_SESSION["addQuestion"]; $x++)
   {   if ($x<$_SESSION["addQuestion"])  {  ?>
       <div class="form-row">
           <div class="form-group col-2"></div>
             <div class="form-group col-8" >
               <label for="survey_title"><i>Create question # <?php echo $x; ?></i></label>
               <input type="text"
                value="<?php
                if (isset($_SESSION["QUESTION"][$x-1]) && $_SESSION["QUESTION"][$x-1] != null)
                echo $_SESSION["QUESTION"][$x-1];
                else
                echo "";
                ?>"
                required class="form-control"
                oninput="<?php echo "Question".$x."(this.value);"; ?>"
                placeholder="Enter Survey question" >
             </div>
           <div class="form-group col-2"></div>
       </div>
     <?php  } else { ?>

       <div class="form-row">
           <div class="form-group col-2"></div>
             <div class="form-group col-7" >
               <label for="survey_title"><i>Create question # <?php echo $x; ?></i></label>
               <input type="text"
                value="<?php
                if (isset($_SESSION["QUESTION"][$x-1]) && $_SESSION["QUESTION"][$x-1] != null)
                echo $_SESSION["QUESTION"][$x-1];
                else
                echo "";
                ?>"
                required class="form-control"
                oninput="<?php echo "Question".$x."(this.value);"; ?>"
                placeholder="Enter Survey question" >
             </div>
             <div class="form-group col-1">
               <label for="survey_title" style="color:transparent;">s</label>
               <a   class="btn btn-danger form-control"   style="color:white"; onclick="removeNewQuestionField('Questions');" ><i class="bi bi-trash"></i></a>
             </div>
           <div class="form-group col-2"></div>
       </div>
<?php    }} ?>
<?php
          for ($x =$_SESSION["addQuestion"]+1; $x<=20 ; $x++) { unset($_SESSION["QUESTION"][$x-1]); }

} ?>
