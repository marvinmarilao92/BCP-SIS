<?php session_start(); ?>
<form method="POST" action="" enctype="multipart/form-data">
<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
  <div class="form-group col-sm-4" >
    <h4 style="font-family: "Lucida Console", "Courier New", monospace;">
      Create a job post
    </h4>
  </div>
</div>


<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Company:</label>
        <input  type="text" id="JPosting"
         value ="<?php if (isset($_SESSION["Company_Name"])) {echo $_SESSION["Company_Name"]; } ?>" required
         name="Company"   placeholder="Input Company here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>

<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Job title:</label>
        <input  type="text" id="JPosting"   name="Job_title"
        value ="<?php if (isset($_SESSION["Job_Title"])) {echo $_SESSION["Job_Title"]; } ?>"
        placeholder="Input Job title here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>

<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Job type:</label>
        <input  type="text" id="JPosting"   name="Job_type"
        value ="<?php if (isset($_SESSION["Job_Type"])) {echo $_SESSION["Job_Type"]; } ?>"
        placeholder="Input Job type here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>

<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Work location:</label>
        <input  type="text" id="JPosting"   name="Work_location"
        value ="<?php if (isset($_SESSION["Work_Location"])) {echo $_SESSION["Work_Location"]; } ?>"
        placeholder="Input Work location here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>


<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Salary:</label>
        <input  type="text" id="JPosting"   name="Salary"
         value ="<?php if (isset($_SESSION["Salary"])) {echo $_SESSION["Salary"]; } ?>"
         placeholder="Input Salary here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>

<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Insert Link (Optional):</label>
        <input  type="text" id="JPosting"   name="jobLink"
        value ="<?php if (isset($_SESSION["job_link"])) {echo $_SESSION["job_link"]; } ?>"
           placeholder="Input link here" class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>


<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Insert Photo:</label>
        <input  type="file" id="JPosting"   name="jobphoto"  class="form-control animate__animated animate__pulse"  >
    </div>
  <div class="form-group col-sm-2" ></div>
</div>



<div class="form-row" >
  <div class="form-group col-sm-2" ></div>
    <div class="form-group col-sm-8" >
        <label for="JPosting" >Job Qualification, Requirements & Description:</label>
        <textarea class="form-control"  id="JPosting" name="jobQRD" id="exampleFormControlTextarea1" placeholder="Input Description here" rows="5"><?php if (isset($_SESSION["Job_Description"])) {echo $_SESSION["Job_Description"]; } ?></textarea>
    </div>
  <div class="form-group col-sm-2" ></div>
</div>


<div class="form-row" >
   <div class="form-group col-sm-6" ></div>
      <div class="form-group col-sm-2" >
          <button type="submit" class="btn btn-primary form-group" name="createPOST"
          style="width: 100%; background-color:#2d8ae0;">Submit</button>
      </div>

      <div class="form-group col-sm-2" >
          <button type="submit" style="width:100%;" name="createDRAFT" class="btn btn-primary">View post</button>
      </div>
   <div class="form-group col-sm-2" ></div>
</div>

</form>
