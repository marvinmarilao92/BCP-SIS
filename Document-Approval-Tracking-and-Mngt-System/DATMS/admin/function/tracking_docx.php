<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "sis_db");
$output = '';
$error = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = " SELECT * FROM datms_tracking WHERE doc_code = '".$search."'";
}
else
{
 $query = "SELECT * FROM datms_tracking ORDER BY doc_code";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
    $actor = $row["doc_actor1"];
     // Declare and define two dates
     $date1 = strtotime($row["doc_date1"]);
     $date2 = strtotime($row["doc_date2"]);

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
       $duration = "$years"." yr,"." "."$months"." mos";
     }else if($months != 0 ){
       $duration = "$months"." mos";
     }else if($days != 0 ){
       $duration = "$days"." days";
     }else if($hours != 0 ){
       $duration = "$hours"." hrs";
     }else if($minutes != 0 ){
       $duration = "$minutes"." min";
     }else if($seconds != 0 ){
       $duration = "$seconds";
     }else{
       $duration = "2";
     }

  $output .= '
    <div class="activity-item d-flex">
      <div class="activite-label card-title">'.$duration.'</div>
      <i class="bi bi-circle-fill activity-badge text-info align-self-start" style="padding-top: 25px;"></i>
      <div class="activity-content card-title" >
        Document set status Created by <a href="#" class="fw-bold text-dark actor">'.$actor.'</a> at<a href="#" class="fw-bold text-dark"> Accounting Office</a> 
      </div>
    </div>  
  ';
  
 }
 echo $output;
}
else
{
  $error .='
    <div class="alert alert-danger border-light alert-dismissible fade show" role="alert">
      No document to track in our database or you input incomplete code
    </div>
  ';
 echo $error;
}

?>