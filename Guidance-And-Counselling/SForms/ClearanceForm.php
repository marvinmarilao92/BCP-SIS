<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function CLearance_Student()
{   ?>
     <div class="form-row">
        	    <div class="col">
			<label for="Firstname">First name</label>
			<input type="text" class="form-control" name="Firstname"  placeholder="Enter Firstname" required="">
		    </div>

		    <div class="col">
			<label for="Middlename">Middle name</label>
			<input type="text" class="form-control" name="Middlename"  placeholder="Enter Middlename" required="">
		    </div>
		    <div class="col">
                        <label for="Lastname">Last name</label>
		        <input type="text" class="form-control" name="Lastname"  placeholder="Enter Lastname" required="">
		    </div>
        </div> 
		
		<div class="form-row">
                    
                    <div class="col">
                        <label for="Emailadd">Email</label>
			<input type="Email" class="form-control" name="Emailadd"  placeholder="Enter Email" required="">
                    </div>
                    
		    <div class="col">
			   <label for="Username">Course</label>
			   <select class="form-select" style="
			   height: 53px; text-align: center; font-size: 15px; color: #47476b">
			   		<option value="BSIT">BS Information Technology</option>
					<option value="BSHM">BS Hospitality Management</option>
					<option value="BSOA">BS Office Administration</option>
                                        
                                        <option value="BSCRIM">BS Criminology</option>
                                        <option value="BEED">Bachelor of Elementary Education</option>
                                        <option value="BSCpE">BS Computer Engineering</option>
                                        <option value="BLIS">Bachelor of Library in Information Science</option>
                                        <option value="BSTM">BS Tourism Management</option>
                                        <option value="BSEntrep">BS Entrepreneurship</option>
                                        <option value="BSAIS">BS Accounting Information System</option>
                                        <option value="BSP">BS Psychology</option>
				</select>
		    </div>

		    <div class="col">
			    <label for="ContactNum">Contact Number</label>
			    <input type="number" class="form-control" name="ContactNum"  placeholder="Contact Number" required="">
		    </div>
		</div>

                 
         <div class="form-row">
         	<div class="col">
                    <label for="Year_Level">Year Level</label>
                    <input type="text" class="form-control" name="Year_Level" placeholder="Enter Year Level" required="">
         	</div>
         	<div class="col">
                    <label for="Section">Section</label>
                    <input type="text" class="form-control" name="Section" placeholder="Enter Section" required="">
         	</div>
         	<div class="col">
                    <label for="image">Profile Picture</label>
                     <input type="file" class="form-control" name="image" placeholder="Enter image" required="">
         	</div>
         </div>
            
         <div class="row">
         	<div class="col">
                    <label for="StudentID">Student ID</label>
                    <input type="number" class="form-control" name="Username" placeholder="Enter Student ID" required="">
         	</div>
         	<div class="col">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" name="Username" placeholder="Enter Username" required="">
         	</div>
         </div>

        <div class="row">
           <div class="col">  
		<label for="Password">Password</label>
		<input type="Password" class="form-control" name="Password"  placeholder="Enter Password" required="">
            </div>
            <div class="col">
                <label for="ConPassword">Confirm Password</label>
		<input type="Password" class="form-control" name="ConPassword"  placeholder="Confirm Password" required="">
            </div>
        </div>
          
<?php } 



function CLearance_Teacher()
{ ?>
    <div class="row">
           <div class="col">  
		<label for="Password">Password</label>
		<input type="Password" class="form-control" name="Password"  placeholder="Enter Password" required="">
            </div>
            <div class="col">
                <label for="ConPassword">Confirm Password</label>
		<input type="Password" class="form-control" name="ConPassword"  placeholder="Confirm Password" required="">
            </div>
        </div>
<?php }






?>



      