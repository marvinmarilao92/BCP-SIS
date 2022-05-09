<?php
require_once "security/newsource.php";
$query = "SELECT ms_labtest.*, student_information.email FROM ms_labtest LEFT JOIN student_information ON ms_labtest.id_number = student_information.id_number ORDER BY id ASC";
$query_run = mysqli_query($conn, $query);
date_default_timezone_set("asia/manila");
$tablename = "ms_labtest";
?>
<!-- Table Head -->
<thead style="background-color:whitesmoke;">
  <tr>
    <th scope="col">ID Number</th>
    <th scope="col">Full Name</th>
    <th scope="col">Date</th>
    <th scope="col">Course</th>
    <th scope="col">Year Level</th>
    <th scope="col">Phone #</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
  <?php
  if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
      // $date1 = $row['sched_from'];
      // $date2 = $row['sched_to'];
      // $newDate1 = date("F j, Y", strtotime($date1));
      // $newDate2 = date("F j, Y", strtotime($date2));
  ?>
  <tr>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['id_number']; ?></td>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['full_n']; ?></td>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['datetime']; ?></td>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['course']; ?></td>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['yr_lvl']; ?></td>
    <td onclick="edit();" id="editID" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['contact']; ?></td>
    <td id="Send" title="edit" style="cursor:pointer;" value="<?php echo $row['id'] ?>">
      <?php echo $row['email']; ?><a title="send" class="btn btn-secondary btn-sm" href="#"><i
          class="bx bx-send"></i></a></td>
    <td>
      <a href="#" class="btn btn-warning btn-sm" onclick="viewContent(<?php echo $row['id']; ?>, 'viewresult');"
        title="View" href="#" id="veiwID"><i class="bx bxs-bullseye"></i>View</a>
      <a title="view" class="btn btn-secondary btn-sm"
        href="resources/viewPDF.php?file=<?= $row['file_name']; ?>&tablename=<?= $tablename ?>"><i
          class="bx bxs-file-pdf"></i>PDF</a>
      <a class="btn btn-danger btn-sm" name="id_trash" onclick="deleteID()" title="Delete" href="#" id="deleteID"
        value="<?php echo $row['id']; ?>"><i class="bx bxs-trash-alt"></i>Delete</a>
    </td>
  </tr>
  <?php }
  }
  ?>
</tbody>