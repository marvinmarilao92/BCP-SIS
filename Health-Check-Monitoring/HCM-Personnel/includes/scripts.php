
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['success']; ?>",
        icon: "<?php echo $_SESSION['success_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['success']);
}
?>

<?php
if(isset($_SESSION['qmark']) && $_SESSION['qmark'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['qmark']; ?>",
        icon: "<?php echo $_SESSION['qmark_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['qmark']);
}
?>

<?php
if(isset($_SESSION['fail']) && $_SESSION['fail'] !='' )
{
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['fail']; ?>",
        icon: "<?php echo $_SESSION['fail_code']; ?>",
        }).then(okay => {
        if (okay) {
          window.location.href = href;
        }
      });
    </script>
  <?php
  unset($_SESSION['fail']);
}
?>

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

