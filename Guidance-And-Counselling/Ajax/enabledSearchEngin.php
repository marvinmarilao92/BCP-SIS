<?php session_start(); ?>

<i class="bi bi-search"></i><input type="text" class="form-control"
placeholder="<?php if (isset($_SESSION["SStudent_ID"])) {echo $_SESSION["SStudent_ID"]; }
else { echo "Search Student ID";} ?>" id="searchLogs" onchange="getStdLGrecords(this.value, 'Stdlogs')"
style="border:none; border-bottom: 2px solid grey; background-color:transparent;"
>
