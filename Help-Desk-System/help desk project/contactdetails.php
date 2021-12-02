<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;}

.center {
  text-align: center;
}

</style>
</head>
<body>
<div class="sidebar">
    <a class="active" href="adminwindow.php">Admin Window</a>
    <a href="contactdetails.php">Contact Forms</a>
  
</div>
<div class="wrapper">
<div class="container-fluid">           
<div class="row">
<div class="col-md-12">
                    
    <div class="mt-5 mb-3 clearfix">
    <h2>Courses</h2>
    </div>
    
    <div id="piechart" class="center" ></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 2],
        ['TV', 4],
        ['Gym', 2],
        ['Sleep', 8]
        ]);

         // Optional; add a title and set the width and height of the chart
        var options = {'title':'My Average Day', 'width':550, 'height':400};

         // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        }
        </script>
                    
                    
<div class="mt-5 mb-3 clearfix">
<h2 class="pull-left">Form Details</h2>
</div>
    <?php
                            // Include config file
                            require_once "config.php";
                    
                                // Attempt select query execution
                                $sql = "SELECT * FROM contactform";
                                    if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Course</th>";                                        
                                        echo "<th>Name</th>";
                                        echo "<th>ID</th>";
                                        echo "<th>Number</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Message</th>";
                                        echo "<th>Action</th>";                                       
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['course'] . "</td>";                                        
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['number'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['message'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="viewform.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="deleteform.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                        echo "</tr>";
                                        }
                                        echo "</tbody>";                            
                                        echo "</table>";
                                        // Free result set
                                        mysqli_free_result($result);
                                    }else{
                                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                    }}else{
                                        echo "Oops! Something went wrong. Please try again later.";}

    // Close connection
    mysqli_close($link);
    ?>
    </div>
    </div>        
    </div>   
    </div>
    
</body>
</html>
