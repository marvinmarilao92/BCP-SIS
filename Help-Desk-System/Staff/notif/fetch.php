<?php
//fetch.php;
include('../session.php');
$d1;
$d2;
if(isset($_POST["view"]))
{
 include("../include/conn.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE datms_notification SET stat1 = 1 WHERE (act1 = 'Staff') AND stat1 = 0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT * FROM datms_notification WHERE (act1 = 'Staff') ORDER BY date desc LIMIT 10";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
      date_default_timezone_set("asia/manila");
      $date = date("Y-m-d H:i:s",strtotime("+0 HOURS"));
      $d1 = $row["date"];
      $doc_status = $row["subject"];
      $today = date("Y-m-d",strtotime("+0 HOURS"));
      $d2 = $date;
      // Declare and define two dates
      $date1 = strtotime("$d1");
      $date2 = strtotime("$d2");

      // Formulate the Difference between two dates
      $diff = abs($date2 - $date1);
    
      // To get the year divide the resultant date into
      // total seconds in a year (365*60*60*24)
      $years = floor($diff / (365*60*60*24));
    
      // To get the month, subtract it with years and
      // divide the resultant date into
      // total seconds in a month (30*60*60*24)
      $months = floor(($diff - $years * 365*60*60*24)
                                    / (30*60*60*24));
    
      // To get the day, subtract it with years and
      // months and divide the resultant date into
      // total seconds in a days (60*60*24)
      $days = floor(($diff - $years * 365*60*60*24 -
                  $months*30*60*60*24)/ (60*60*24));
    
      // To get the hour, subtract it with years,
      // months & seconds and divide the resultant
      // date into total seconds in a hours (60*60)
      $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
                                        / (60*60));
    
      // To get the minutes, subtract it with years,
      // months, seconds and hours and divide the
      // resultant date into total seconds i.e. 60
      $minutes = floor(($diff - $years * 365*60*60*24
              - $months*30*60*60*24 - $days*60*60*24
                                - $hours*60*60)/ 60);
    
      // To get the minutes, subtract it with years,
      // months, seconds, hours and minutes
      $seconds = floor(($diff - $years * 365*60*60*24
              - $months*30*60*60*24 - $days*60*60*24
                      - $hours*60*60 - $minutes*60));
            
      if($years !=0 ){
        // Print the result
        $duration = "$years"." yr,";
      }else if($months != 0 ){
        $duration = "$months"." mos";
      }else if($days > 1 ){
        $duration = "$days"." days";
      }else if($days == 1 ){
        $duration = "$days"." day";
      }else if($hours > 1){
        $duration = "$hours"." hrs";
      }else if($hours == 1){
        $duration = "$hours"." hr";
      }else if($minutes != 0 ){
        $duration = "$minutes"." min";
      }else if($seconds != 0 ){
        $duration = "$seconds"." sec";
      }else if($seconds == 0 ){
        $duration = "1"." sec";
      }else{
        $duration = "2";
      }

      if ($doc_status =='Approved Document' || $doc_status =='Request Approved'){
        $idenifier='<i class="bi bi-check-circle text-success"></i>';
       }else if($doc_status =='Rejected Document' || $doc_status =='Request Rejected'){
        $idenifier=' <i class="bi bi-x-circle text-danger"></i>';
       }else if($doc_status =='Received Document'){
        $idenifier=' <i class="bi bi-arrow-down-circle text-primary"></i>';
       }else if($doc_status =='Submitted Document'){
        $idenifier=' <i class="bi bi-arrow-right-circle text-warning"></i>';       
       }else if($doc_status =='You have incoming ticket'){
        $idenifier=' <i class="ri-ticket-line text-primary"></i>';       
       }else{
        $idenifier=' <i class="ri-ticket-line text-primary"></i>';
       }

       $query_2 = "SELECT * FROM datms_notification WHERE date = '$d1' AND date LIKE '%$today%'";
       $result_2 = mysqli_query($conn, $query_2);
       $count1 = mysqli_num_rows($result_2);

       if($count1!=0){
        $badge='<span style=" color: green;">●</span>';
       }else{
        $badge='<span style=" color: gray;">●</span>';
       }

       if ($doc_status =='Approved Document' || $doc_status =='Created Document'){
        $links='documents_list?id='.$_SESSION["login_key"].'';
       }else if($doc_status =='Rejected Document'){
        $links='reject_docs?id='.$_SESSION["login_key"].'';
       }else if($doc_status =='Received Document'){
        $links='received_docs?id='.$_SESSION["login_key"].'';
       }else if($doc_status =='Submitted Document'){
        $links='incoming_docs?id='.$_SESSION["login_key"].'';       
       }else if($doc_status =='You have incoming ticket'){
        $links='ticket_list?id='.$_SESSION["login_key"].'';       
      }else{
        $links='ticket_list?id='.$_SESSION["login_key"].'';
       }
       
       if ($doc_status =='Request Rejected'){
        $links='request_record?id='.$_SESSION["login_key"].'';        
       }else if ($doc_status =='Request Approved'){
        $links='request_record?id='.$_SESSION["login_key"].'';        
       }else if ($doc_status =='You have incoming ticket'){
        $links='ticket_list?id='.$_SESSION["login_key"].'';        
       }

    $output .= '
      <li class="notification-item">
        '.$idenifier.'
        <a href="'.$links.'" style="color: rgb(33, 37, 41);">
        <div>
          <h4>'.$row["subject"].'</h4>
          <p>'.$row["notif"].' <br>From: '.$row["dept"].' </p>
          <p>'.$duration.' ago '.$badge.'</p>
        </div>
        </a>
      </li>
      
      <li>
        <hr class="dropdown-divider">
      </li>
    ';
  }
 }
 else
 {
  $output .= '
      <li class="notification-item">
        <i class="bi bi-question-circle text-secondary"></i>
        <a href="index?id='.$_SESSION["login_key"].'" style="color: rgb(33, 37, 41);">
          <div>   
            <h4>No Notification</h4>       
            <p>You have no notification today</p> 
          </div>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
  ';
 }
 
 $query_1 = "SELECT * FROM datms_notification WHERE (act1 = '$verified_session_role ' OR act1 = 'Staff') AND stat1 = 0";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>