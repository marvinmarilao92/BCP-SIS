    <!-- Sweet Alert -->



<script src="../assets/js/sweetalert.min.js"></script>

<?php if (isset($_GET['error']))
         { ?>
                <script>
                swal({
                title: "<?php echo $_GET['error']; ?>",
                //text: "You clicked the button!",
                icon: "error",
                button: "Done",
                });
                </script>
                  
                 <?php } ?>

 <!-- <script>

  swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});

  </script>