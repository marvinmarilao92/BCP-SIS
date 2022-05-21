<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
<!--	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
                        color: #0a4c00;
			font-family: calibri;

		}
		body
		{
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			width: 100vw;
                        text-align: center;

		}
		.container
		{
			text-align: center;
			position: relative;
			width:350px;
			border-bottom: 10px solid black;
			border-top: 10px solid black;
			border-radius: 80px 80px;
			padding: 20px;

		}
                @media only screen and (max-width: 768px)
                {
                    .container
                    {

                      text-align: center;
			position: relative;
			width:310px;
                        height:500px;
			border-bottom: 10px solid black;
			border-top: 10px solid black;
			border-radius: 80px 80px;
			padding: 20px;
                    }
                }
                @media only screen and (max-width: 460px)
                {
                    .container {
                        text-align: center;
			position: relative;
			width:310px;
                        height:350px;
			border-bottom: 10px solid black;
			border-top: 10px solid black;
			border-radius: 80px 80px;
			padding: 10px;
                        padding-top: 0%;
                        margin-top:0%;

                    }
                   body
                   {
                       margin: 0%;
                   }
                    img{
                        visibility: hidden;
                        margin: 0
                    }
                    input, button{
                        margin-top: -20%;
                    }
                    .label
                    {
                        margin-top: -30%;
                        padding: 10px;
                    }
                    .fs{
                         margin-bottom: -5px;
                          margin-top: -10%;
                          padding: 10px;
                    }
                    .acc
                    {
                        margin-bottom: -5px;
                        margin-top: -5%;
                        padding: 10px;
                    }

                }
		input, button
		{
			width: 100%;
			border: 0;
			border-radius: 20px;
		}
		input
		{
			border-bottom: 2px solid #444;
			padding: 12px 40px 12px 20px;
		}
		input, button, .group i, p, a
		{
			font-size: 13.3333px;
			font-weight: 600;

		}
		.group
		{
			margin-bottom:  10px;
			position: relative;
		}
		.group i
		{
			position: absolute;
			top: 15px;
			right: 20px;
		}
		#sub
		{
			padding: 12px;
			background-image: linear-gradient(to right, cyan, blue);
			margin-bottom: 20px;
			cursor: pointer;
			border-bottom: 2px solid #444;
		}
		#sub, #sub i
		{
			color: #fff;
		}
		#sub i
		{
			margin-right: 5px;
		}
		p
		{
			margin-bottom: 20px;
		}
		i.fa.fa-empire, a
		{
			color: blue;
                        text-decoration: none;
		}
                i.fa.fa-empire:hover, a:hover
		{
			color: maroon;

		}
		i.img-logo img
		{
			font-size: 60px;
			margin-bottom: 20px;
                        border: 1px solid white;
                        border-radius: 70px 70px 70px 70px;
			margin-left: 0%;
			top: 0%;
			height: 100px;
		}
		i.img-user img
		{
			font-size: 60px;
			margin-bottom: 20px;
			margin-left: 0%;
			top: 0%;
			height: 20px;
		}
		i.img-pass img
		{
			font-size: 60px;
			margin-bottom: 20px;
			margin-left: 0%;
			top: 0%;
			height: 20px;
		}
		i.img-login img
		{
			margin-left: 0%;
			height: 15px;
			width: 25px;
			position: absolute;
			top: 0px;
			right: 150px;
		}
		.label
		{
			color: black;
                        font-family: arial black    ;
		}
                #modalClose
                {
                    margin-left: 70%;
                }
                #ButtonFM
                {
                     margin-left: 65%;
                     width: 100px;
                }
                .modal-header
                {
                    color: red;
                }
		input:focus, input:focus::placeholder, input:focus+i
		{
			color: darkblue;
			font-family: sans-serif;
			font-style: bold;
		}
		input:focus, button:focus
		{
			outline: 0;
		}
		body:before, body:after
		{
			content: "";
			position: absolute;
			height: 300px;
			width: 500px;
		}
		body:before
		{
			/*background-image: linear-gradient(to right, cyan, blue);*/
			bottom: 0;
			left: 0;
			clip-path: polygon(0 0, 0 100%, 100% 100%);
		}
		body:after
		{
			/*background-image: linear-gradient(to right, blue, cyan);*/
			top: 0;
			right: 0;
			clip-path: polygon(100% 0, 0 0, 100% 100%);
		}
		@media (max-width: 767px)
		{
				body:before, body:after
				{
					height: 150px;
					width: 300px;
				}
		}
               .fs
               {
                   margin-top: -8%;
                   padding: 10px;
               }
               .acc
               {
                    margin-top: -8%;
               }
	</style>-->
  <style>
/*      body{
          background-image:url("Login/bg.jpg");
          background-repeat: no-repeat, repeat;
      }*/
  </style>
</head>
<body>


<!--    <div class="container">

             <form action="accVerify.php" method="POST">
               <i class="img-logo"> <img src="https://www.clipartkey.com/mpngs/m/19-191718_group-clipart-self-help-group-guidance-and-counselling.png"></i>
               <br><h4 class="label"><b>Enter your Account</b></h4><br>
	 	<div class="form-group">
	 		<input type="text" name="Username" placeholder="Username">
	 	</div><br>
	 	<div class="form-group">
	 		<input type="Password" name="Password" placeholder="Password">
	 	</div><br>

	 	<div class="form-group">
                    <button type="submit" id="sub" name="LoginbtnUMS"> <i class="img-login"></i> Login</button>
	 	</div><br>
                </form>
	 	 <p class="fs">Forgot <a href="">Username</a> / <a href="#">Password</a> ?</p>
                 <p class="acc"> Don't have an account ? <a href="CreateAccout.php" target="_SELF"
                                                             > Sign up </a></p>
    </div>-->

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

<!--              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div> End Logo -->


								<div class="card mb-3" style="border: none; background-color: transparent;">
                   <div class="card-body">
                       <img src="Login/BCPLOGO.png" width="140px" height="140px">
                   </div>
                </div>
              <div class="card mb-3" style="border: none; background-color: transparent;">

                  <div class="card-body" style="margin-top: -10%;">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                    <form class="row g-3 needs-validation"  method="POST" action="accVerify.php">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                          <input type="text" name="Username" class="form-control" id="yourUsername" required style="text-align: center">
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" id="yourPassword" required style="text-align: center;">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="LoginbtnUMS">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="#">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

<!--              <div class="credits">
                 All the links in the footer should remain intact.
                 You can delete the links only if you purchased the pro version.
                 Licensing information: https://bootstrapmade.com/license/
                 Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>-->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
  <footer class="page-footer font-small indigo" >
  <div class="container text-center text-md-left">

  </div>

  <div class="footer-copyright text-center py-3">
    &copy; Copyright <strong><span>Guidance and Counseling</span></strong>. All Rights Reserved
  </div>


</footer>
</body>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>
