<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["enabledB"]))
    {
      echo '<button type="submit" onclick="fetchFilter(';
        echo "'filterPost'";
      echo ');"
      class="btn btn-primary animate__animated animate__bounceIn">Done</button>';
    }

 ?>
