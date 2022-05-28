<?php
include('includes/session.php');
?>
   <!DOCTYPE html>
   <html lang="en">
   <title>Article</title>
   <head>
   <?php include ('includes/head.php');//css connection?>
   </head>

   <body>
   <?php include ('includes/nav.php');//Design for  Header?>
   <?php $page = 'faqs';include ('includes/sidebar.php');//Design for sidebar?>
  

  <main id="main" class="main">
  <div class="pagetitle">
    
      
    </div>
    
    <?php
    
    $title = mysqli_real_escape_string($link, $_GET['title']);
    $shortDesc = mysqli_real_escape_string($link, $_GET['shortDesc']);
    $sql = "SELECT * FROM hd_department WHERE title = '$title' AND shortDesc= '$shortDesc'";

     $result = mysqli_query($link, $sql);
     $queryResult = mysqli_num_rows($result);
 

     
  
     if ($queryResult >0) {
        while($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $longDesc = $row['longDesc'];
            $shortDesc = $row['shortDesc'];
            echo "
     
            <div class='style'>
            <h2 class = 'second'>".$row['title']."  <h6>".$row['date']."</h6></h2>
            <h3 class = 'third'>".nl2br($row['longDesc'])."</h3>
           
            <span class='badge bg-success'><i class='ri-book-3-line'></i>".$row['shortDesc']."</span>
            </div>";

        }
      }
            ?>
    
    

<style>
 .style{
   
    margin-bottom: 1rem;
    padding: 1.5rem 1rem;
    color: #555;
   
   
  }
.second{
    font-size: 30px;
    font-weight: 500;
  }
.third {
    font-size: 17px;
    margin-bottom: 1rem;
    margin-top: 1rem;
  }


     </style>
 
           
     <p> <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>"><span class="badge bg-primary"><i class="ri-reply-all-fill"></i>Back</span></a></p>
    

    
    
    

  </main><!-- End #main -->

  
 <!-- ======= Footer ======= -->

 <?php include 'includes/footer.php'?>


  </body>
</html>