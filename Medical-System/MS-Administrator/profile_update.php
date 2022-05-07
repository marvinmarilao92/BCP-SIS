<?php 
include('security/newsource.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

  $about = $_POST['about'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $sql = "UPDATE user_information
          SET `about` = '{$about}',
              `address` = '{$address}',
              `contact` = '{$phone}',
              `email` = '{$email}'
          WHERE `id_number` = '$verified_session_username'";
  $sql_run = mysqli_query($conn, $sql);

  if(!$sql_run){
    echo "Error";
  } else {
    echo "Success";
    header("location:". $_SERVER['HTTP_REFERER']);
  }

}
?>
