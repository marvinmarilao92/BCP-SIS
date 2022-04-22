<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "sis_db";

$conn = mysqli_connect($server_name,$db_username,$db_password,$db_name);

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

// define('DB_SERVER', '31.220.110.2');
// define('DB_USERNAME', 'u692894633_sis_db');
// define('DB_PASSWORD', 'l95o@WMN6~a');
// define('DB_NAME', 'u692894633_sis_db');

// /* Attempt to connect to MySQL database */
// $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// // Check connection
// if($conn === false){  
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
?>