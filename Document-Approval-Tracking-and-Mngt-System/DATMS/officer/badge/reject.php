<?php
//fetcg side nav badge
include('../session.php');
if(isset($_POST["view"]))
{
 include("../include/conn.php");
 $output = '';
 $query_1 = "SELECT * FROM datms_documents WHERE `doc_status` = 'Rejected' AND (`doc_actor2`='$verified_session_firstname $verified_session_lastname ')";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
