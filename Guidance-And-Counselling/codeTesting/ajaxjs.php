
<?php
// Fetching Values From URL
$name2 = $_POST['name1'];
$email2 = $_POST['email1'];
$password2 = $_POST['password1'];
$contact2 = $_POST['contact1'];


include  'db.php';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'mydba';
$db = new databaseFunction($dbhost, $dbuser, $dbpass, $dbname);

$insert = $db->query('INSERT INTO form_element (student_name, student_email, student_contact, student_address)  VALUES (?,?,?,?)' ,$name2, $email2, $password2, $contact2);


// $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
// $db = mysql_select_db("mydba", $connection); // Selecting Database
// if (isset($_POST['name1'])) {
// $query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')"); //Insert Query
// echo "Form Submitted succesfully";
// }
// mysql_close($connection); // Connection Closed


?>
