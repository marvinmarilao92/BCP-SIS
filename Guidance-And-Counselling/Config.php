<?php

include  'db.php';

//$dbhost = 'localhost';
//$dbuser = 'root';
//$dbpass = '';
//$dbname = 'bcpsis';


//$dbhost = 'localhost';
//$dbuser = 'u692894633_sis_cluster6a';
//$dbpass = '?kZ]!w7?k+1';
//$dbname = 'u692894633_SIS_C6A';

//DB USER PASS
//u692894633_SIS_C6A
//u692894633_sis_cluster6a
//?kZ]!w7?k+1



/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '31.220.110.2');
define('DB_USERNAME', 'u692894633_sis_cluster6a');
define('DB_PASSWORD', '?kZ]!w7?k+1');
define('DB_NAME', 'u692894633_SIS_C6A');



$db = new databaseFunction(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//
// $db = new databaseFunction($dbhost, $dbuser, $dbpass, $dbname);

//$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// NOTE::: db class changed to 'databaseFunction'

//User User input also ....
//$account = $db->query('SELECT * FROM usermanagements WHERE username = ? AND password = ?', 1,1)-->fetchArray();
//echo $account['first_name'];







//use for User input ....
//Fetch a record from a database:
//$account = $db->query('SELECT * FROM accademic WHERE Student_Number = ? AND Student_Name = ?', array('Marky', '18011242'))->fetchArray();
//echo $account['Student_Number'] . " , " . $account['Student_Name'];





//Fetchall data inside of database table...
//Fetch multiple records from a database:
// $accounts = $db->query('SELECT * FROM images')->fetchAll();
// foreach ($accounts as $account) {
// 	echo $account['img_name'] . ".) " . $account['img_data']. '<br>';
// }





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
// $delete = $db->query('delete from validation where ID=?', '3');
//echo $delete->affectedRows();






















//
//$SystemTitle = array(
//      0  array('name' => "Help Desk System"),
//      1  array('name' => "Internship System"),
//      2  array('name' => "LMS EDMODO"),
//      3  array('name' => "BCP Clearance"),
//      4  array('name' => "Guidance and Counselling"),
//      5  array('name' => "Document Approval, Tracking and Mgmt System"),
//      6  array('name' => "Health Check Monitoring"),
//      7  array('name' => "Student Services (Grievances/Discipline)"),
//      8  array('name' => "LMS MOODLE"),
//      9  array('name' => "Medical System"),
//     10  array('name' => "Scholarship System"),
//     11  array('name' => "User Management System")
//    );
//



//https://codeshack.io/super-fast-php-mysql-database-class/
//reference



//DATE AND TIME FORMAT
//$result = mysql_query("SELECT `datetime` FROM `table`");
//$row = mysql_fetch_row($result);
//$date = date_create($row[0]);
//
//echo date_format($date, 'Y-m-d H:i:s');
//#output: 2012-03-24 17:45:12
//
//echo date_format($date, 'd/m/Y H:i:s');
//#output: 24/03/2012 17:45:12
//
//echo date_format($date, 'd/m/y');
//#output: 24/03/12
//
//echo date_format($date, 'g:i A');
//#output: 5:45 PM
//
//echo date_format($date, 'G:ia');
//#output: 05:45pm
//
//echo date_format($date, 'g:ia \o\n l jS F Y');
//#output: 5:45pm on Saturday 24th March 2012
//
