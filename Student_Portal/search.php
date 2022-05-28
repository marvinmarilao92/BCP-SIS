<?php
include('includes/session.php');
?>
   <!DOCTYPE html>
   <html lang="en">
   <title>Search Result</title>
   <head>
   <?php include ('includes/head.php');//css connection?>
   </head>

   <body>
   <?php include ('includes/nav.php');//Design for  Header?>
   <?php $page = 'faqs';include ('includes/sidebar.php');//Design for sidebar?>



  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Search results</h1>
      
    </div>
    <?php
    
   
    
      //check if any input 
    if( isset($_GET['k']) && $_GET['k'] != '' ) {
      
     
      $k = trim($_GET['k']);

        $k = mysqli_real_escape_string($link, $_GET['k']);
        $sql = "SELECT * FROM hd_department WHERE title LIKE '%$k%' OR shortDesc LIKE '%$k%'
         OR longDesc LIKE '%$k%'";
         
         $result = mysqli_query($link, $sql);
         $queryResult = mysqli_num_rows($result);
     

         echo "There are " .$queryResult. " result! <br><br>";
      
         if ($queryResult >0) {
            while($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $longDesc = $row['longDesc'];
                $shortDesc = $row['shortDesc'];
                echo "
                <a href = 'article.php?title=".$row['title']."&shortDesc=".$row['shortDesc']."'>
                <div class='style'>
                <h2>".$row['title']."</h2>
                <h6>Read More <span class='text-danger'>&rarr;</span></h6>
                </div>";
                ?>

<style>
 .style{
   
    margin-bottom: 1rem;
    padding: 1.5rem 1rem;
    color: #555;
   
   
  }


     </style>
 
                    <?php
            }
         }else {
             echo "<section class='section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center'>
             <h2>Opps we can't find your search!<br>try searching common question. </h2>
             <img src='../assets/img/not-found.svg' class='img-fluid py-5' alt='Page Not Found'></section> ";
            
             
         }
         
    }
    ?>
     <p> <a href="pages-faq.php?id=<?php echo $_SESSION["login_key"];?>"><span class="badge bg-primary"><i class="ri-reply-all-fill"></i>Back</span></a></p>
    

    
    
    

  </main><!-- End #main -->

  
 <!-- ======= Footer ======= -->

 <?php include 'includes/footer.php'?>


  </body>
</html>