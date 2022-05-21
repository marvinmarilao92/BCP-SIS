<?php

       session_start(); 
       if(!isset($_SESSION['success']))
       {
            echo '<script type="text/javascript">location.href = "modules.php"</script>'; 
            die();
       }

       if(session_destroy()) { echo '<script type="text/javascript">location.href = "modules.php"</script>';  }
       
       
          
   