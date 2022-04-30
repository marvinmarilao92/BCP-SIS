<?php
require '../include/config.php';
require '../constants/check-login.php';
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

if ($_FILES["image"]["size"] > 1000000) {
header("location:../?r=3478");
}else{
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("UPDATE ims_users SET ims_avatar='$image' WHERE ims_uid='$myid'");
    $stmt->execute();
	
	$stmt = $conn->prepare("SELECT * FROM ims_users WHERE ims_uid'$myid'");
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $row)
    {
     $_SESSION['avatar'] = $row['avatar'];
	 header("location:../");
	} 
	
					  
	}catch(PDOException $e)
    {

    }

	
}

?>