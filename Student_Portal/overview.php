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
      <h1>Review</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?php echo 'index.php?'.$key;
          ?>>Home</a></li>
          <li class="breadcrumb-item">Inbox</li>
          <li class="breadcrumb-item active">Msg</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <br>
              

              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">

                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Pending</button>
                </li>
                
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Qualified</button>
                </li>

                 <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Screening</button>
                </li>

              </ul>
              <br>
              <!-- Pending msg -->
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                      <section class="section">
                        <div class="row">

                          <div class="col-lg-12">

                            <div class="card">
                              <div class="card-body">

                                <!--MSG FROM DEPT COOR PENDING ISSUE-->
                                 <?php
                                          $sql5 = "SELECT *FROM ims_msgdepttostud_coor
                                            INNER JOIN ims_apply_info
                                            ON
                                            ims_apply_info.s_number = ims_msgdepttostud_coor.s_number
                                            WHERE
                                            ims_apply_info.s_number ='$verified_session_username'
                                            AND
                                            ims_apply_info.status = 'Pending' ";
                                                if($result5 = mysqli_query($link, $sql5)){
                                                  if(mysqli_num_rows($result5) > 0){
                                                    while($row5 = mysqli_fetch_array($result5)){


                                                ?>
                                                <h5 class="card-title">From: <?php echo $row5['deptCoor_Name']?></h5>

                              

 
                                                <p style="font-style: italic;
                                                      text-align: center;"><?php echo $row5['msg'] ?></p>

                                  <?php


                                                  }
                                                // Free result set
                                                
                                              }else{

                                              echo  "<br><div class='alert alert-danger' role='alert' >
                                <center>
                                           No Data Found !
                                </center>
                          </div>";}
                                            }
                                            
                                             

                                            
                                  ?>



                              </div>
                            </div>

                          </div>
                        </div>
                      </section>
                </div>
                
                <!-- Qualified Msg -->
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <section class="section">
                        <div class="row">

                          <div class="col-lg-12">
                                  
                                <div class="card">    
                                    <div class="card-body">
                                  <?php
                                          $sql5 = "SELECT *FROM ims_msgdepttostud_coor
                                            INNER JOIN ims_apply_info
                                            ON
                                            ims_apply_info.s_number = ims_msgdepttostud_coor.s_number
                                            WHERE
                                            ims_apply_info.s_number = '$verified_session_username'
                                            AND
                                            ims_apply_info.status = 'Qualified' ";
                                                if($result5 = mysqli_query($link, $sql5)){
                                                  if(mysqli_num_rows($result5) > 0){
                                                    while($row5 = mysqli_fetch_array($result5)){


                                                ?>
                                                <h5 class="card-title">From: <?php echo $row5['deptCoor_Name']?></h5>

                              

 
                                                <p style="font-style: italic;
                                                      text-align: center;"><?php echo $row5['msg'] ?></p>

                                  <?php


                                                  }
                                                // Free result set
                                               
                                              }
                                           else{

                                              echo  "<br><div class='alert alert-danger' role='alert' >
                                <center>
                                           No Data Found !
                                </center>
                          </div>";}
                                            }
                                            
                                             

                                            
                                  ?>

                              </div>
                            </div>

                          </div>
                        </div>
                      </section>
                </div>
                
                <!-- Sccreening Msg -->
                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                  <section class="section">
                        <div class="row">

                          <div class="col-lg-12">

                            <div class="card">
                              <div class="card-body">
                                
                              </div>
                            </div>

                          </div>
                        </div>
                      </section>
                </div>
              </div><!-- End Bordered Tabs Justified -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

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