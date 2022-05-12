<!DOCTYPE html>

<?php require 'session.php'; ?>
<html lang="en" >

<head>
  
  <title>Bestlink College of the Philippines  </title>
  <?php require 'header.php'; ?>

</head>

<body >

  <!-- ======= Header ======= -->
  <?php require 'nav.php'; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" >

    <?php require 'sidebar.php'; ?>


    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><i class="bi bi-exclamation-circle-fill" style="width:10px;"></i>Fair Warning</h5>
              <div class="no-overflow"><p><b>PROSECUTION</b>: Under Philippine law (Republic Act No. 8293), copyright infringement is punishable by the following: Imprisonment of between 1 to 3 years and a fine of between 50,000 to 150,000 pesos for the first offense. Imprisonment of 3 years and 1 day to six years plus a fine of between 150,000 to 500,000 pesos for the second offense.</p><p><b>COURSE OF ACTION</b>: Whoever has maliciously uploaded these concerned materials are hereby given an ultimatum to take it down within 24-hours. Beyond the 24-hour grace period, our Legal Department shall initiate the proceedings in coordination with the National Bureau of Investigation for IP Address tracking, account owner identification, and filing of cases for prosecution.</p></div>
            <div class="footer"></div>
            </div>
          </div>
  </aside>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Site Posting</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="coordinator/..">Home</a></li>
          <li class="breadcrumb-item">Site</li>
          <li class="breadcrumb-item active">Posting</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


		<div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- No Labels Form -->
              	<?php if (isset($_GET['success'])) { ?>
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?php echo $_GET['success']; ?>
                </div>
                 <?php } ?>
              <form class="row g-3"  action = constant/post.php method="POST">


                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Post Title" name ="title" style="height: 80px">
                </div>

                
                <div class="col-12">		

                  
                    <textarea class="form-control" style="height: 100px" name = "desc" placeholder = "Description"></textarea>
                  
                </div>
                <div class="col-md-8">
                  <input type="text" name = "city" class="form-control" placeholder="City" style="height: 80px">
                </div>

                <div class="col-md-4">
                  <select id="inputState" class="form-select" style="height: 80px"  name="country">
                    <option disabled value="">Category</option>
                   										   <?php

														   require 'constant/config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$sname;dbname=$db_name", $uname, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

															$country = $row['country_name'];
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  		
                                                           foreach($result as $row)
                                                           {
		                                                    ?>

		                                                    <option 

		                                                    <?php if ($country == $row['country_name']) 

		                                                    { print ' selected '; } 
		                                                    ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
                  </select>
                </div>
               

               
                  <button type="submit" class="btn btn-primary" name="submit" style="height: 70px;">POST</button>
                  
              
              </form><!-- End No Labels Form -->

            </div>
  <br>
                </div>
</div>
<br>
<br>
</div>
</section>
</main>
<!-- ======= Footer ======= -->
  <?php require 'footer.php'; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php require 'js.php'; ?>

</body>
  

</html>