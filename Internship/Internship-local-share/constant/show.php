<?php
// Connect to the database
include_once 'config.php';
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
$result = $conn->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<h2><p>There are no files in the database</p></h2>';
    }
    else {
        // Print the top of a table
        echo '<table width="">
                <tr>
                    <td><b>Filename</b></td>
                    <td><b>File Extension</b></td>
                    <td><b>Date Upload</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$db_name->error}</pre>";
}
 
// Close the mysql connection
$conn->close();
?>