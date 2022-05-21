<?php
include_once('security/newsource.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>HCM | Dashboard</title>

<head>
  <?php include('includes/head_ext.php'); ?>

</head>

<body>
  <?php $page = "check-up";
  $nav = "health-monitoring"; ?>
  <?php include('includes/header.php'); ?>
  <?php include('includes/sidebar.php'); ?>
  <main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle">
      <h1>BCP Check-up</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?=<?php echo $_SESSION['login_key']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Check-up</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row mt-5">
        <div class="col-xxl-12 col-md-12">
          <div class="card p-4">
            <div class="col-lg-12">
              <div class="alert alert-info text-center" role="alert">
                <h4 class="alert-heading">Check up</h4>
                <p class="mb-0">Search first to show information</p>
              </div>
              <div class="col-12 col-md-4 input-group mb-3">
                <div class="input-group-prepend">
                  <span onclick="searchthis('showResult');" style="cursor:pointer;" class="input-group-text p-3"
                    id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                      class="bi bi-search" viewBox="0 0 16 16">
                      <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></span>
                </div>
                <input type="text" class="form-control text-center" name="id_number" id="id_number"
                  placeholder="ID Number" style="text-transform:capitalize;" onchange="searchthis('showResult');"
                  required>
              </div>
              <div id="showResult"></div>
              <div class="text-center">
                <button type="submit" onclick="insertCheckUP('errorMessage');" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- dsadsads -->

    </section> <!-- End -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="text-light">Scheduled Check-up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="schedResult"></div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
              data-bs-dismiss="modal">Okay</button>
          </div>
        </div>
      </div>
    </div>

    <div id="errorMessage"></div>
  </main>
  <script>
  function checkupNOW(schedResult) {
    $.ajax({
      url: 'ajax/schedResult.php',
      success: function(html) {
        var ajaxDisplay = document.getElementById(schedResult);
        ajaxDisplay.innerHTML = html;
        $('#exampleModalToggle').modal('show')
      }
    });
  }
  </script>
  <script>
  function searchthis(showResult) {
    var id_number = document.getElementById("id_number").value;
    var takeDataintoArray =
      'id_number=' + id_number;
    if (id_number != '') {
      $.ajax({
        type: "GET",
        url: 'ajax/searchID.php',
        data: takeDataintoArray,
        cache: false,
        success: function(html) {
          var ajaxDisplay = document.getElementById(showResult);
          ajaxDisplay.innerHTML = html;
        }
      });
    } else {
      alert('Asd')
    }
  }
  </script>
  <script type="text/javascript">
  function formSubmit() {
    $.ajax({
      type: 'POST',
      url: 'insert.php',
      data: $('#frmBox').serialize(),
      success: function(response) {
        $('#success').html(response);
      }
    });
  }
  var form = document.getElementById('frmBox').reset();
  return false;
  </script>


<script>

  function insertCheckUP(error)
  {

    // var file = document.getElementById("file").value;
    // var treatment = document.getElementById("treatment").value;
    // var prod_quantity = document.getElementById("prod_quantityprod_quantity").value;
    // var prod_quantity = document.getElementById("prod_quantity").value;


    var prod_name = document.getElementById("prod_name").value;
    var treatment = document.getElementById("treatment").value;
    var fullname = document.getElementById("fullname").value;

    var prod_quantity = document.getElementById("prod_quantity").value;
    var prescription = document.getElementById("prescription").value;
    var aid = document.getElementById("aid").value;



    var intoArray =

    'fullname='       + fullname +
    '&treatment='      + treatment +
    '&prod_name='      + prod_name +
    '&prod_quantity='      + prod_quantity +
    '&prescription='      + prescription +
    '&aid='      + aid ;


    if (fullname == '' || treatment == '' || prod_name == '' ||
       prod_quantity == '' || prescription == '' || aid == '')
    {
      Swal.fire(
      'Invalid!',
      'Please complete fieldset!',
      'warning'
      )
    }
    else
    {
      Swal.fire({
      title: 'Are you sure?',
      text: "some info here!",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: 'ajax/insertCheckUp.php',
          data: intoArray,
          cache: false,
          success: function (html)
          {
            Swal.fire(
              'Add!',
              'Some info here.',
              'success'
              )
              var error = document.getElementById(error);
              error.innerHTML = html;
            }
          });
        }
      })
    }
  }
</script>

<script>
    function validateCurrentQTY(thisItem, validates)
    {
      $.ajax({
        url: 'ajax/validateQTY.php?thisItem=' + thisItem,
        success: function(html)
        {
          var validate = document.getElementById(validates);
          validate.innerHTML = html;
          $("#prod_quantity").keydown(function(event) { return false; });
        }
      });
    }
</script>

  <?php include('includes/footer.php'); ?>
</body>

</html>
