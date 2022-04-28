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

		<div class="card">
			<div class="card-body">
				<br>
				<!-- Slides with indicators -->
				<!-- <h5 class="card-title"></h5> -->
				<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 11"></button>
					</div>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="../assets/img/banners/banner7.jpg"  class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner3.jpg" class="d-block w-100" alt="...">
						</div>                
						<div class="carousel-item">
							<img src="../assets/img/banners/banner5.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner6.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner2.jpg" class="d-block w-100" alt="...">
						</div> 
						<div class="carousel-item">
							<img src="../assets/img/banners/banner8.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner9.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner10.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner11.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner12.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../assets/img/banners/banner13.jpg" class="d-block w-100" alt="...">
						</div>
					</div>

					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>

				</div><!-- End Slides with indicators -->
				<!-- news feed body starts here -->
			</div>
		</div>
  </main><!-- End #main -->

	<?php
	include ("includes/footer.php");
	?>

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