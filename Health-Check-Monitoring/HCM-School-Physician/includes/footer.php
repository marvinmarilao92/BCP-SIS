<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>School System</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://facebook.com/">HCM Module</a>
    </div>
    
  </footer><!-- End Footer -->

<!-- ======= Scripts ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="cropperjs/cropper.min.js" type="text/javascript"></script>
  <!-- datatable filter -->
  <!-- <script type="text/javascript" src="dataTables.filter.html.js"></script> -->
  <!-- for sweet alert -->
  <script src="../assets/vendor/bootstrap/js/sweetalert2.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/jquery-3.6.0.min.js"></script>
  <!-- For barcode -->
  <script src="../assets/vendor/bootstrap/js/JsBarcode.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <!-- Datatable JS connection -->
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

  <!-- Ajax JS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->

  <!-- Selector search -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- ======= @marilao Swal2 Script======= -->
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !='' )
{
  ?>
     <script type = "text/javascript">
        //status message
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProsressBar: true,
        didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer)
        toast.addEventListener("mouseleave", Swal.resumeTimer)                  
        }
        })
        Toast.fire({
        icon: "<?php echo $_SESSION['status_icon'] ?>",
        title:"<?php echo $_SESSION['status']; ?>"
        })
    </script>
  <?php
  unset($_SESSION['status']);
}
?>


<!-- ======= @me Swal1 PHP======= -->
<?php
if(isset($_SESSION['#']) && $_SESSION['#'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['#']; ?>",
        icon: "<?php echo $_SESSION['#_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['#']);
}
?>

<?php
if(isset($_SESSION['#']) && $_SESSION['#'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['#']; ?>",
        icon: "<?php echo $_SESSION['#_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['#']);
}
?>

<?php
if(isset($_SESSION['#']) && $_SESSION['#'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['#']; ?>",
        icon: "<?php echo $_SESSION['#_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['#']);
}
?>

<!-- ======= @me Swal JS ======= -->
  <script>

    $('#btn-del').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
    Swal.fire({
          title : "Are You Sure?",
          text : "Record will be deleted?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Delete Record',
      }). then((result) => {
              if (result.value) {
                  document.location.href = href;
              }
      })
  })
      const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            type: 'success',
            title: 'Success',
            text: 'Record has been deleted!'
        })
    }

  </script>

  <script>
    $('#confirm').on('click', function() {
      Swal.fire({
        type: 'confirm',
        title: 'Success!',
        text: 'successfully confirmed'
        // alert("The paragraph was clicked.");
      })
    })

    $('#cancel').on('click', function() {
      Swal.fire({
        type: 'cancel',
        title: 'Cancelled!',
        text: 'request cancelled'
        // alert("The paragraph was clicked.");
      })
    })

    $('#deny').on('click', function() {
      Swal.fire({
        icon: 'error',
        title: 'Deleted!',
        text: 'successfully deleted item',
        showCloseButton: true,
        // alert("The paragraph was clicked.");
      })
    })
  </script>

