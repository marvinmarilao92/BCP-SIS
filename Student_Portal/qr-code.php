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
  $page = 'qr';
  include("includes/nav.php");
  include("includes/sidebar.php");
  ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact Tracing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?id=<?= $_SESSION['login_key']; ?> ">Home</a></li>
          <li class="breadcrumb-item">QR Code</li>
        </ol>
      </nav>
    </div>
    <section class="section">
      <div class="row">
        <div class="col">
          <div class="container">
            <div class="card">
              <div class="card-body p-4">
                <div class="alert alert-info">
                  <div class="card-title">
                    <big>Here's your QR Code</big>
                    <hr>
                  </div>
                </div>
                <div class="row d-flex justify-content-center">
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-body text-center p-5">
                          <h2>Health Check Monitoring</h2>
                          <hr>
                          <h5> Contact Tracing</h5>
                          <div class="row text-center p-5">
                            <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                              <input id="user-fullname" type="text" class="form-control"
                                value="<?php echo $verified_session_lastname . ', ' . $verified_session_firstname . ' ' . $verified_session_middlename; ?>"
                                disabled>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                              <input id="user-contact" type="text" class="form-control"
                                value="<?php echo $verified_session_contact; ?>" disabled>
                            </div>
                            <div class="col-12 p-3">
                              <input id="user-address" type="text" class="form-control"
                                value="<?php echo $verified_session_address; ?>" disabled>
                            </div>
                            <div class="col-12 p-3">
                              <input id="user-email" type="text" class="form-control"
                                value="<?php echo $verified_session_email; ?>" disabled>
                            </div>
                            <input type="hidden" id="user-id" value="<?php echo $verified_session_username; ?>">
                            <input type="hidden" id="user-lname" value="<?php echo $verified_session_lastname; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col p-5 d-flex justify-content-center">
                        <button class="mt-1 btn btn-primary" name="QR" onClick="generateQR();">Show Qr Code</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->



      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary ">
              <h5 class="modal-title text-white">QR Code</h5>
              <a type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body">
              <div class="container-fluid justify-content-center d-flex">
                <div id="qrcode" class="p-4 "></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Print</button>
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
  const userFullName = document.getElementById('user-fullname').value;
  const userContact = document.getElementById('user-contact').value;
  const userAddress = document.getElementById('user-address').value;
  const userEmail = document.getElementById('user-email').value;
  const userId = document.getElementById('user-id').value;
  const userlname = document.getElementById('user-lname').value;

  const qrData = userFullName + " " + userContact + " " + userAddress + " " + userEmail + " " + userId;
  const qrCode = new QRCode(document.getElementById('qrcode'));

  function generateQR() {

    insertToDB(userFullName, userContact, userAddress, userEmail, userId, userlname);

  }

  // | id                                                                | name  | contact | address  | email             |
  // | 5l7j56'8658i56k8-43-534534;.=5-64360458;345345"P?67865n756&%":462 | name1 | 123456  | address1 | myemail@gmail.com |
  // | tere4i54w5809234 | name1 | 123456  | address1 | myemail@gmail.com |
  // | 5l7j56'8658i56k8-43-534534;.=5-64360458;345345"P?67865n756&%":462 | name1 | 123456  | address1 | myemail@gmail.com |
  // | 5l7j56'8658i56k8-43-534534;.=5-64360458;345345"P?67865n756&%":462 | name1 | 123456  | address1 | myemail@gmail.com |
  function insertToDB(userFullName, userContact, userAddress, userEmail, userId, userlname) {
    const newuserId = userId + "" + "#" + "" + userlname;
    // const userId = encryptIdBase64(info);
    var array = 'userFullName=' + userFullName + '&userContact=' + userContact + '&userAddress=' + userAddress +
      '&userEmail=' + userEmail + '&userId=' + newuserId;
    console.log(array);
    $.ajax({
      type: "POST",
      url: 'function/ajax/insertToDB.php',
      data: array,
      cache: false,
      success: function(html) {
        $('#modelId').modal('show');
        qrCode.makeCode(qrData);

      }
    });
    // AJAX post request to qrcode db to insert the user info
    // create auto generated unique code format Ex. full_name-timestamp = andres,reniel-05-28-22 then encrypt to base-64
  }

  function getUniqueId() {
    // AJAX get request from qrcode db to get the unique id
    const id = 123;
    return id;
  }

  function encryptIdBase64(uid) {
    const encoded = btoa(uid);
    return encoded;
  }

  function decryptIdBase64(encoded) {
    const decoded = atob(encoded);
    return decoded;
  }
  </script>
</body>


</html>