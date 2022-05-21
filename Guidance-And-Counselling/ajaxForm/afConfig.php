<?php
  include  'db.php';

  define('DB_SERVER', '31.220.110.2');
  define('DB_USERNAME', 'u692894633_sis_cluster6a');
  define('DB_PASSWORD', '?kZ]!w7?k+1');
  define('DB_NAME', 'u692894633_SIS_C6A');



  $db = new databaseFunction(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


 //User User input also ....
 //$account = $db->query('SELECT * FROM usermanagements WHERE username = ? AND password = ?', 1,1)-->fetchArray();
 //echo $account['first_name'];





 //use for User input ....
 //Fetch a record from a database:
 //$account = $db->query('SELECT * FROM accademic WHERE Student_Number = ? AND Student_Name = ?', array('Marky', '18011242'))->fetchArray();
 //echo $account['Student_Number'] . " , " . $account['Student_Name'];





 //Fetchall data inside of database table...
 //Fetch multiple records from a database:
 //$accounts = $db->query('SELECT * FROM images')->fetchAll();
 //foreach ($accounts as $account) {
 //	echo $account['img_name'] . ".) " . $account['img_data']. '<br>';
 //}





 //Fetching some picture
 //$accounts = $db->query('SELECT * FROM images')->fetchAll();
 //foreach ($accounts as $account) {
 //	echo $account['img_name'] . '<br>';
 //
 //        $img = base64_encode($account['img_data']);
 //        $ext = pathinfo($account['img_name'], PATHINFO_EXTENSION);
 //        echo "<img src='data:image/".$ext.";base64,".$img."'/>";
 //}





 ////You can specify a callback if you do not want the results being stored in an array (useful for large amounts of data):
 //$db->query('SELECT * FROM accademic')->fetchAll(function($account) {
 //
 //    if ($account['ID'] === 20 && $account['Student_Number'] === "Martin")
 //        :
 //            echo '<br>'. "They have a break here ". '<br>';
 //            return 'break';
 //        endif;
 //        // This if statement is .. additional
 //
 //    echo $account['ID'] . ".) " . $account['Student_Number']. '<br>';
 //});


 // Take a number of Rows
 //$accounts = $db->query('SELECT * FROM accademic');
 //echo $accounts->numRows();


 // This query is for ... Insert data from database table
 //$test ="asdasd";
 //$insert = $db->query('INSERT INTO StudentInfo (Student_ID)  VALUES (?)' ,$test);
 //echo $insert->affectedRows();


 //include 'Forms/timezone.php';
 ////////This Query use for Update some record on DB table
 //$udpate = $db->query('UPDATE usermanagements SET updated_at=? WHERE ID=1', $dt->format('Y-m-d H:i:s'));
 ////echo $udpate->affectedRows();


 ////This Query use for Update some record on DB table
 //$delete = $db->query('delete from validation where ID=?', '3');
 //echo $delete->affectedRows();

  ?>
