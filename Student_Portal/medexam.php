<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include("includes/head.php");
  ?>
</head>

<body>

  <?php
  $page = 'medexam';
  include("includes/nav.php");
  include("includes/sidebar.php");
  ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Medical Examination</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?id=<?= $_SESSION['login_key']; ?> ">Home</a></li>
          <li class="breadcrumb-item">Medical Examination</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
              <div class="alert alert-info">
                <div class="card-title">
                  <big>Please Read the Instructions Carefully</big>
                  <hr>
                </div>
              </div>
              <div class="container ">
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <div class="card-title text-center pt-5">Annual Medical Examination</div>
                            <div class="row d-flex justify-content-center">
                              <div class="wrapper p-4">
                                <h5><strong>Steps</strong></h5>
                                <hr>
                                <small>
                                  <li class="pt-2">Please Pay via Student Module or BCP Main branch Cashier</li>
                                </small>
                                <small>
                                  <li class="pt-2">Wait for the Schedule to be Announced at your News Feed</li>
                                </small>
                                <small>
                                  <li class="pt-2">Generate Your Stub Here at Your Account</li>
                                </small>
                                <small>
                                  <li class="pt-2">Complete the Medical Examination</li>
                                </small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col d-flex justify-content-center">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Already Paid ?</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header bg-info">
          <h5 id="offcanvasRightLabel" class=" text-white">User Security</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="alert alert-info">
                  <div class="card-title">Please kindly fill up this form for Security Purpose</div>
                  <hr><small>After this you will get your Stub</small>
                </div>
                <div id="errorMessage"></div>
                <div class="form-group p-5">
                  <h5 class="p-2">ID Number</h5>
                  <input type="text" class="form-control" id="id_number">
                  <h5 class="p-2">Refernce No.</h5>
                  <input type="password" class="form-control" id="ref_no">
                  <div class="form-check pt-2">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" onclick="myFunction();">
                    <label class="form-check-label" for="flexCheckDefault">
                      Show Reference Number
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col d-flex justify-content-center">
                <button class="btn btn-primary btn-md" onclick="ShowTicket('ShowTicketNow', 'errorMessage');">Generate
                  Stub</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Student Stub</h5>
              <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div id="ShowTicketNow"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="printDiv();">Print</button>
            </div>
          </div>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <?php
  include("includes/footer.php");
  ?>

  <script>
  function ShowTicket(ShowTicketNow, errorMessage) {
    var id_number = document.getElementById("id_number").value;
    var ref_no = document.getElementById("ref_no").value;
    var array = 'id_number=' + id_number +
      '&ref_no=' + ref_no;
    if (id_number == "" || ref_no == "") {
      $.ajax({
        type: "GET",
        url: 'function/ajax/errorMsg.php',
        data: array,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(errorMessage);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      $.ajax({
        type: "GET",
        url: 'function/ajax/giveStub.php',
        data: array,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(ShowTicketNow);
          ajaxDisplay.innerHTML = html;
          $('#modelId').modal('show');
        }
      });
    }
  }
  </script>


  <script>
  function myFunction() {
    var x = document.getElementById("ref_no");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }


  function nextButton() {

    document.getElementById("progress").setAttribute("value", "35%");
    document.getElementById("progress").style.width = "35%";

  }
  </script>
  <script>
  function printDiv() {
    var divContents = document.getElementById("ShowTicketNow").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body > <h1>Div contents are <br>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
  }
  </script>
  <!-- <script>
  jQuery('#divId').print( /* options */ );

  jQuery.print('#divId' /*, options */ );

  jQuery('#divId').print({
    globalStyles: true,
    mediaPrint: false,
    stylesheet: null,
    noPrintSelector: '.no-print',
    iframe: true,
    append: null,
    prepend: null,
    manuallyCopyFormValues: true,
    deferred: jQuery.Deferred(),
    timeout: 750,
    title: null,
    doctype: '<!doctype html>'
  });
  </script> -->
</body>


</html>