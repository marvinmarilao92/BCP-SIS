<!-- Sweet Alert -->
<script src="sweetalert.min.js"></script>

    <?php if (isset($_GET['success']))
      { ?>
            <script>
            swal({
            title: "<?php echo $_GET['success']; ?>",
            //text: "You clicked the button!",
            icon: "success",
            button: "Done",
            });
      </script>
    
    <?php } ?>