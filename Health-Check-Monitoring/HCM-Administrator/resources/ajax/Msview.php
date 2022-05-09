<?php 
 require_once 'Config.php';
 require_once 'timezone.php';
 
 $fetchLabtest = $db->query('SELECT * FROM ms_labtest WHERE id = ?',  $_GET["viewID"] )->fetchArray();

?>

<input type="text" class = "form-control" id="full_name" value = "<?php echo $fetchLabtest['full_n']; ?>" disabled>