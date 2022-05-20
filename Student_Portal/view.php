<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include ("includes/head.php");
?>

<body>

	<?php
	$page ='dash';
	include ("includes/nav.php");
	include ("includes/sidebar.php");
	?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>News Feed</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">News Feed</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- <h2>Hello Student</h2> -->
		<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- banners -->
            <div class="col-12">           
									<!-- Slides with indicators -->
									<!-- <h5 class="card-title"></h5> -->
									<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
										<div class="carousel-indicators">
										
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active">
											
												<img src="../assets/img/helpdesk.png"  class="d-block w-100" alt="...">
											</div>
										</div>

										
										<br>
									</div><!-- End Slides with indicators -->
									<!-- news feed body starts here -->
					
            </div><!-- End banners -->
			
            <!-- Department Posts -->
            <div class="col-12">
         
   
            <?php
    include "includes/conn.php";

   

    $query = "SELECT * FROM hdms_post";
    $result=mysqli_query($conn,$query);
    if($result){
        while($row = mysqli_fetch_assoc($result)) {?>

   
              <div class="card mb-3">
              
                <div class="row g-0">
                 
                  
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo''.$row['title'].'&nbsp;|&nbsp;'.$row['date'].' '?></h5>
					  <span class="badge border-info border-1 text-info" style ="font-size:14px">Author : Staff of help Desk</span><br><br> 
                      <p class="card-text"><?php echo''.nl2br($row['content']).''?></p>
                     
                      </div>
                  </div>
                
                </div>
				<?php }

				}else {
	 
				echo '<div class="alert alert-warning"><em>No records were found.</em></div>';

 				}




				?>
              </div>
            </div><!-- End Department Posts -->


            <!-- Department Posts -->
            <!-- <div class="col-12">
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Department Post <span>| Today</span></h5>
                </div>
              </div>
            </div> -->
						<!-- End Department Posts -->

          </div>
        </div><!-- End Left side columns -->

     
  </main><!-- End #main -->

	<?php
	include ("includes/footer.php");
	?>
  <?php include ("view_ticket.php"); ?>
</body>
<!-- prevent you for turning back -->
	<script>
		(function (global) {

			if(typeof (global) === "undefined") {
					throw new Error("window is undefined");
			}

			var _hash = "!";
			var noBackPlease = function () {
					global.location.href += "#";

					// Making sure we have the fruit available for juice (^__^)
					global.setTimeout(function () {
							global.location.href += "!";
					}, 50);
			};

			global.onhashchange = function () {
					if (global.location.hash !== _hash) {
							global.location.hash = _hash;
					}
			};

			global.onload = function () {
					noBackPlease();

					// Disables backspace on page except on input fields and textarea..
					document.body.onkeydown = function (e) {
							var elm = e.target.nodeName.toLowerCase();
							if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
									e.preventDefault();
							}
							// Stopping the event bubbling up the DOM tree...
							e.stopPropagation();
					};
			}
		})(window);
	</script>
  </html>