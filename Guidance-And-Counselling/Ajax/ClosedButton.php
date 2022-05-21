<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["closedBtn"]))
    {
      echo '<button type="button"  disabled class="btn btn-primary">Done</button>';
    }
 ?>
