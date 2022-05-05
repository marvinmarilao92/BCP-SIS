<?php include('security/newsource.php');

if(isset($_POST['crop_image']))
{
    $data = $_POST['crop_image'];
    $image_array_1=explode(";", $data);
    $image_array_2=explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);
    $path_img='../../assets/users/'.time().'.png';
    $imagename=''.time().'.png';
    file_put_contents ($path_img, $base64_decode);

    $updateIMG = $db->query('UPDATE user_information SET user_img = ? WHERE id_number= ?', $imagename, $verified_session_username);

}
?>