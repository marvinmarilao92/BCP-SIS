<?php session_start();

  require_once 'Config.php';
  require_once 'timezone.php';

  $insert = $db->query('INSERT INTO gac_jobpost (Company_Name
  , Job_Title, Job_Type, Job_Description, Salary, Work_Location, job_link)  VALUES (?,?,?,?,?,?,?)'
  , $_POST["Job_Title"], $_POST["Job_Title"], $_POST["Job_Type"], $_POST["Job_Description"],
   $_POST["Salary"], $_POST["Work_Location"], $_POST["job_link"]);

   unset($_SESSION["draftKEY"]);

 ?>


 <div class="form-row ">
   <div class="form-group col-sm-2" ></div>
 <div class="form-group col-sm-8" style="height: 80%;">
   <div style="background-color: white;  border-radius: 10px; box-shadow: -5px 15px 15px 5px #77aac9;">
     <div style="padding: 10px; ">
   <form class="needs-validation" novalidate>
       <h5><a href=""><b></b></a>

         <span class="float-right" style="" >
           <div class="dropdown show ">
               <a class="" style="color:black;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="bi bi-three-dots-vertical"></i>
               </a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                 <a  class="dropdown-item"  id="draftPost" onclick="draftPost(draftPost, 'draftPostDetails', 'errorMessage');" >
                   <i class="bi bi-sticky"></i> Create Post</a>
                 <a class="dropdown-item" href="#" id="viewPost" onclick="viewPost(viewPost, 'draftPostDetails', 'errorMessage');" >
                   <i class="bi bi-eye"></i> View Post</a>
                 <a class="dropdown-item" href="#"><i class="bi bi-image"></i> Add Photo</a>
               </div>
             </div>
         </span>
       </h5>

       <span class="text-primary">Company name:</span>
           <div class="input-group">
             <input type="text" class="form-control" id="Company_Name"  aria-describedby="inputGroupPrepend" required>
             <div class="invalid-feedback">
               Please fill a Company name.
             </div>
           </div>

     <span class="text-primary">Job Title:</span>
         <div class="input-group">
           <input type="text" class="form-control" id="Job_Title" aria-describedby="inputGroupPrepend" required>
           <div class="invalid-feedback">
             Please fill a job title.
           </div>
         </div>

     <span class="text-primary"> Job Type: </span>
       <div class="input-group">
         <input type="text" class="form-control" id="Job_Type"  aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please fill a job type.
         </div>
       </div>


     <span class="text-primary"> Description :</span>
       <div class="input-group">
         <textarea type="text" class="form-control"rows="5"  id="Job_Description"  aria-describedby="inputGroupPrepend" required></textarea>
         <div class="invalid-feedback">
           Please fill a job Description.
         </div>
       </div>

     <span class="text-primary"> Salary: </span>
       <div class="input-group">
         <input type="text" class="form-control" id="Salary"  aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please fill a job Salary.
         </div>
       </div>

     <span class="text-primary"> Work location: </span>
       <div class="input-group">
         <input type="text" class="form-control" id="Work_Location"  aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please fill a Work location.
         </div>
       </div>

     <span class="text-primary">  Link: </span>
       <div class="input-group">
         <input type="text" class="form-control" id="job_link" aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please fill a Link:
         </div>
       </div>
     </p>
     </div>
     <!-- <img src=""  class="img-fluid" width="100%" style="border-radius: 0px 0px 10px 10px"> -->
   </div>
 </div>

<div class="form-group col-sm-2" ></div>
</div>
