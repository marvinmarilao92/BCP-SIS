<?php 
 require_once 'Config.php';
 require_once 'timezone.php';
 
 $fetchLabtest = $db->query('SELECT * FROM ms_labtest WHERE id = ?',  $_GET["viewID"] )->fetchArray();
 date_default_timezone_set("asia/manila");
 $date1 = $fetchLabtest['datetime'];
 $date2 = $fetchLabtest['datetime'];
 $newDate = date("F j, Y", strtotime($date1));
 $newTime = date("h:i:s", strtotime($date2));
?>
<div class="container">
  <div class="form-group">
    <h5 class = "text-danger" >Personal Information</h5>
    <div class="row pt-1">
      <div class="col">
        <small for="id_number">ID Number</small>
        <input type="hidden" id= "id" value ="<?php echo $_GET["viewID"] ?>"/>
        <input type="text" class = "form-control" id="id_number" value ="<?php echo $fetchLabtest['id_number']; ?>" disabled>
      </div>
      <div class="col">
        <small for="full_name">Full Name</small>
        <input type="text" class = "form-control" id="full_name" value="<?php echo $fetchLabtest['full_n']; ?>" disabled>
      </div>
    </div>
    <div class="row pt-1">
      <div class="col">
      <small for="course">Course</small>
        <input type="text" class = "form-control" id="course" value = "<?php echo $fetchLabtest['course']; ?>" disabled>
      </div>
      <div class="col">
      <small for="yr_lvl">Year Level</small>
        <input type="text" class = "form-control" id="yr_lvl" value = "<?php echo $fetchLabtest['yr_lvl']; ?>" disabled>
      </div>
    </div>
    <div class="row pt-1">
      <div class="col">
      <small for="contact">Phone</small>
        <input type="text" class = "form-control" id="contact" value = "<?php echo $fetchLabtest['contact']; ?>" disabled>
      </div>
    </div>
    <div class="row pt-4">
    <h5 class = "text-danger" >Schedule</h5>
      <div class="col">
        <small for="date">Date</small>
        <input type="text" class = "form-control" id="date" value = "<?php echo $newDate; ?>" disabled>
      </div>
      <div class="col">
        <small for="time">Time</small>
        <input type="text" class = "form-control" id="time" value = "<?php echo $newTime; ?>" disabled>
        <input type="hidden" id = "file_name" value ="<?php echo $fetchlabtest['file_name'] ?>"/>
      </div>
    </div>
  </div>
</div>
