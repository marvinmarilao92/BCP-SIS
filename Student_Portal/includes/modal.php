<!--professional Qualification-->
  <div class="modal fade" id="login" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">



        <div class="modal-body">

               <div class="row justify-content-center">
              <img src="../assets/img/BCPlogo.png "  alt="" style=" width: 200px;">
               </div>
                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Please Login your Account first</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                <div class="col-12">
                    <div class="form-floating">
                          <input type="text" class="form-control" name="uname" id="username"   placeholder="first name" autofocus>
                          <label for="floatingName">Username</label>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-floating">
                          <input type="password" class="form-control" name="password" id="password"  placeholder="first name" autofocus>
                          <label for="floatingName">Password</label>
                    </div>
                </div>  
                <br>
                <div class="col-12" style="height: 90px">
                    <a class="btn btn-primary w-100" type="submit" <?php echo 'href=login/index'?>  name="submit" >Login</a>
                </div>

        </div>          
      </div>
    </div>
  </div>




<!--LOGOUT MODAL-->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h3 class="modal-title"> Log out ?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out?
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary" href="control/logout.php">Yes</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


<!--Payment Modal-->

<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Payment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"
        style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">

        <form class="row g-3 needs-validation" action="function/ToPay.php" method="POST">

          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" name="studname" id="studname"
                value="<?php echo $verified_session_firstname . " " . $verified_session_lastname ?>"
                placeholder="Student Name" required readonly>
              <label for="floatingName">Student Name</label>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" name="studnum" id="studnum" pattern="[a-zA-Z0-9]+"
                placeholder="Student Number" value="<?php echo $verified_session_username ?>" required readonly>
              <label for="floatingName">Student Number</label>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" name="pyf" id="pyf" placeholder="Payment For"
                style="height: 90px;" required autofocus>
              <label for="floatingName">Payment For</label>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" name="amount" id="amount" pattern="[a-zA-Z0-9]+"
                placeholder="Amount" required>
              <label for="floatingName">Amount</label>
            </div>
          </div>
          <br>
          <div class="col-12">
            <div class="form-floating">
              <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks"
                style="height: 90px;" required>
              <label for="floatingName">Remarks ( Optional ) </label>
            </div>
          </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit">Continue</button>

      </div>
      </form>
    </div>
  </div>
</div>