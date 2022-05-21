<?php require_once 'SIS-title.php'; ?>

<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="LoginForm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="LoginTitle">What are you looking for? hahaha!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <form method="POST" action="modules.php?title=<?php echo '';?>">
		  <div class="form-group">
		    <label for="Username">Username</label>
		    <input type="text" class="form-control" name="Username" aria-describedby="emailHelp" placeholder="Enter Username" required="">
		    <!-- <small id="emailHelp" class="form-text text-muted">Please provide valid email to get OTP</small> -->
		  </div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" class="form-control" name="Password" placeholder="Enter Password" required="">
		  </div>
      </div>

       <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  data-dismiss="modal" class="btn btn-primary btn-sm btn-course" data-toggle="modal" data-target="#RegistrationForm" >
                           Sign in
                </button>
                <button type="submit" class="btn btn-primary" name="Loginbtn">Login</button>
	       </form>
      </div></div></div></div>

<!--11-->
<div class="modal fade" id="LoginFormUMS" tabindex="-1" role="dialog" aria-labelledby="LoginFormUMS" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="LoginTitleUMS">What are you looking for? hahaha!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <form method="POST" action="accVerify.php?title=<?php echo $SystemTitle[11]['name'];?>">
		  <div class="form-group">
		    <label for="Username">Username</label>
		    <input type="text" class="form-control" name="Username" aria-describedby="emailHelp" placeholder="Enter Username" required="">
		    <!-- <small id="emailHelp" class="form-text text-muted">Please provide valid email to get OTP</small> -->
		  </div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" class="form-control" name="Password" placeholder="Enter Password" required="">
		  </div>
      </div>

       <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  data-dismiss="modal" class="btn btn-primary btn-sm btn-course" data-toggle="modal" data-target="#RegistrationForm" >
                           Sign in
                </button>
                <button type="submit" class="btn btn-primary" name="LoginbtnUMS">Login</button>
	       </form>
      </div></div></div></div>
