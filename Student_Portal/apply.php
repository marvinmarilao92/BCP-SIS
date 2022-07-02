
<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("includes/head.php");
?>

<body>

  <?php
  $page = 'dash';
  include("includes/nav.php");
  include("includes/sidebar.php");
  
  ?>

  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Apply for OJT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Apply</li>
          <li class="breadcrumb-item active">OJT</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              <div class="row justify-content-center" >
              <img src="../assets/img/BCPlogo.png" style="width: 10%;
                                                          height: auto;">
             </div>
              <h5 class="card-title" style="font-size: 1.5rem;
                                            font-family: serif;">Please Fill out the following.</h5>
              
              <form class="row g-3 needs-validation" action="includes/applyy.php" method="POST" enctype="multipart/form-data">

                        <div class="col-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="co_id" <?php echo 'value='.$verified_session_username;?> id="co_id" placeholder="Coordinator_ID" required autofocus readonly>
                              <label for="floatingName" style="font-size: 0.7rem;">Student Number</label>
                            </div>
                          </div>
                          <br>

                           <div class="col-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="sname" id="co_id" placeholder="surname" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Surname</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="fname" id="fname" placeholder="middlename" required autofocus>
                              <label for="floatingName" style="font-size: 0.7rem;">Firstname</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="mname"  id="mname" placeholder="middlename" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Middlename ( Optional )</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-10">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="address"  id="address" placeholder="address" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Present Address</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-2">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="zipcode"  id="zipcode" placeholder="zipcode" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">zipcode</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-8">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="email"  id="email" placeholder="email" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Email Address</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="contact"  id="contact" placeholder="contact" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Contact No.</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-6">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="s_dept" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" selected="selected" disabled>Department</option>
                              <option>Department</option>
                              <option>--/--/--</option>
                              </select>
                              <label for="floatingName" style="font-size: 0.7rem;">Department</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-2">
                            <div class="form-floating">
                              <select type="text" class="form-select" name="s_course" aria-label="State" id="lvl" onchange="oncollapse()" required autofocus>
                              <option value="" style="color:black" select ed="selected" disabled>Select a Course</option>
                              <option>BSAIS</option>
                              <option>BSBA</option>
                              <option>BSCPE</option>
                              <option>BSCRIM</option>
                              <option>BSENTREP</option>
                              <option>BSHM</option>
                              <option>BSIT</option>
                              <option>BSOA</option>
                              <option>BSP</option>
                              <option>BSTM</option>

                              </select>
                              <label for="floatingName" style="font-size: 0.7rem;">Course</label>
                            </div>
                          </div>
                          <br>


                          <div class="col-2">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="section"  id="section" placeholder="lastname" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Section</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-2">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="s_lvl"  id="s_lvl" placeholder="lastname" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Year Level</label>
                            </div>
                          </div>
                          <br>
                          <hr>
                          <h5 class="card-title" style="font-size: 1.5em;
                                            font-family: serif;">Skills</h5>
                          
                          <div class="col-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="category"  id="category" placeholder="s_category" required autofocus >
                              <label for="floatingName" style="font-size: 0.7rem;">Category</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="skills"  id="skills" placeholder="s_skills" required autofocus>
                              <label for="floatingName" style="font-size: 0.7rem;">Skills</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-12">
                            <div class="form-floating">
                              <textarea type="text" class="form-control" name="desc"  id="desc" placeholder="s_desc" required autofocus style="height: 70px;" ></textarea>
                              <label for="floatingName" style="font-size: 0.7rem;">Describe</label>
                            </div>
                          </div>
                          <br>

                          <hr>
                          <h3 class = card-title> Upload Files </h3>

                          <div class = "col-12">

                              <p style="font-size: 1.2em;
                                        font-family: serif;">"Please upload your Evaluation form to check if you are qualified and to be part of our project. Thank You !"</p><br>
                                        <br>


                                        <div class = "container" style="text-align: center">

                                            <span><i class="fa fa-cloud-upload text-dark fa-5x" aria-hidden="true"></i></span>
                                              <p class="text-dark">Choose your file Upload</p></label><br><br>
                                              <input type="file" id="file" class="text-dark" name="uploaded_file"accept="application/pdf, application/vnd.ms-excel" required>
                                            <p>
                                              <br>
                                                  Your filetype must be pdf to avoid error while uploading and size of 4mb.
                                              </p>

                                                <br>
                                                <br>
                                        </div>

                                  </div>    

                                    <button type ="submit"   name ="submit" class="btn btn-primary btn-lg rounded-pill" >Submit</button>


                                  </form>


            </div>
          </div>

        </div>        
      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include("includes/footer.php");
  ?>

</body>
<!-- prevent you for turning back -->
<script>
(function(global) {

  if (typeof(global) === "undefined") {
    throw new Error("window is undefined");
  }

  var _hash = "!";
  var noBackPlease = function() {
    global.location.href += "#";

    // Making sure we have the fruit available for juice (^__^)
    global.setTimeout(function() {
      global.location.href += "!";
    }, 50);
  };

  global.onhashchange = function() {
    if (global.location.hash !== _hash) {
      global.location.hash = _hash;
    }
  };

  global.onload = function() {
    noBackPlease();

    // Disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function(e) {
      var elm = e.target.nodeName.toLowerCase();
      if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
        e.preventDefault();
      }
      // Stopping the event bubbling up the DOM tree...
      e.stopPropagation();
    };
  }
})(window);
</script>

</html>