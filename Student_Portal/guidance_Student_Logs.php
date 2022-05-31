<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>GAC | Student Logs</title>
<head>
<?php
include ("includes/head.php");
?>

</head>
<body>

<?php
$page = 'stdLgs';
include ("includes/nav.php");
include ("includes/sidebar.php");
?>


  <main id="main" class="main">

    <div class="pagetitle">

      <h1>Guidance Services</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Guidance Services</li>
          <li class="breadcrumb-item active">Student Logs</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">

    </section>

  </main>



  <?php include ("includes/footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

</body>
</html>
