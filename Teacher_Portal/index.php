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
$page = 'dash';
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
    <!-- <h2>Hello Teacher</h2> -->

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