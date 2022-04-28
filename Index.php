<!DOCTYPE HTML>
<html>
	<head>
		<?php include ('header.php');//header ?>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<?php $page = 'home'; include 'nav.php';// Navigation bar ?>

	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/mvcampus4.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>The Roots of Education are Bitter, But the Fruit is Sweet</h1>
									<!-- <p><a class="btn btn-primary btn-lg" href="dynamic-login.php" >Start Learning Now!</a></p> -->
									<p><a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/mvcampus3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>The Great Aim of Education is not Knowledge, But Action</h1>
									<!-- <p><a class="btn btn-primary btn-lg" href="dynamic-login.php" >Start Learning Now!</a></p> -->
									<p><a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/mvcampus.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1>We Help You to Learn New Things</h1>
									<!-- <p><a class="btn btn-primary btn-lg" href="dynamic-login.php" >Start Learning Now!</a></p> -->
									<p><a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-course-categories">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Course categories</h2>
					<p></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-shop"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Business</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-heart4"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Health &amp; Psychology</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-banknote"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Accounting</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<!-- new comment -->
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-lab2"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Science &amp; Technology</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-photo"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Art &amp; Media</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-home-outline"></i>
						</span>
						<div class="desc">
							<h3><a href="#">HRM</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-bubble3"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Language</a></h3>
							<p></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="icon-world"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Web &amp; Programming</a></h3>
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-world"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="
							<?php 
								require_once("config.php");
								$query="SELECT * FROM user_information";
								$result=mysqli_query($link,$query);
								if($result){
									echo  mysqli_num_rows($result);
								}
							?> 
							" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Active Users</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-study"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="
							<?php 
								require_once("config.php");
								$query="SELECT * FROM student_information";
								$result=mysqli_query($link,$query);
								if($result){
									echo  mysqli_num_rows($result);
								}
							?> 
							" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Students Enrolled</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-bulb"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="
							<?php 
								require_once("config.php");
								$query="SELECT * FROM datms_program";
								$result=mysqli_query($link,$query);
								if($result){
									echo  mysqli_num_rows($result);
								}
							?> 
							" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Course available</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="
							<?php 
								require_once("config.php");
								$query="SELECT * FROM teacher_information";
								$result=mysqli_query($link,$query);
								if($result){
									echo  mysqli_num_rows($result);
								}
							?> 
							" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Certified Teachers</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-pricing">
		<div class="container">
				<div class="col-md-8 col-md-offset-2 animate-box text-center fh5co-heading">
					<h2>School Official & Professors</h2>
					<p>Responsible for the quality and content of instruction in the classroom. The instructor should at all times strive to promote the general purposes of the University and to achieve the objectives of the College. </p>
				</div>
			<div class="row">
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/CEO_img.png);">
						</div>
						<span>PRESIDENT/ CEO</span>
						<h3><a href="#">DR. MARIA M. VICENTE</a></h3>
						<p>Highest Educational Attainment: Doctor of Humane Letters, Master in Public Administration 1972-1973</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/VICE_img.png);">
						</div>
						<span>EXECUTIVE VICE PRESIDENT</span>
						<h3><a href="https://www.facebook.com/charlie.carino.3">DR. CHARLIE I. CARIÑO</a></h3>
						<p>Highest Educational Attainment: Doctor of Philosophy major in Development of Education, Business Accountancy</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/vpAdmin.png);">
						</div>
						<span>VICE PRESIDENT FOR ADMIN AND FINANCE</span>
						<h3><a>ENGR. DIOSDADO T. LLENO</a></h3>
						<p>Highest Educational Attainment: Master of Science in Information Technology</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/DeanBSIT_img.png);">
						</div>
						<span>DEAN, BS in INFORMATION TECHNOLOGY</span>
						<h3><a href="#">DR. ROSICAR E. ESCOBER</a></h3>
						<p>Educational Attainment: PhD in Business Management, Doctor in Public Administration (Dissertation Writing On-going)</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/DeptheadIT.png);">
						</div>
						<span>PROGRAM HEAD, BSIT</span>
						<h3><a href="https://www.facebook.com/lemmor.1008">MR. ROMMEL J. CONSTANTINO</a></h3>
						<p>Educational Attainment: Doctor of Information Technology - 6 Units earned, Master of Science in Information and Technology</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/DHTour.png);">
						</div>
						<span>PROGRAM HEAD, BSTM</span>
						<h3><a href="https://www.facebook.com/ruby.odulio1">DR. RUBY D. ODULIO</a></h3>
						<p>Doctor of Philosophy major in Development Education, Master of Arts in Educational Management, Master in Business Administration</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/PSPcher.png);">
						</div>
						<span>SPS/ OSA CHAIRMAN</span>
						<h3><a href="#">MS. MA. AMABLE B. BETIS</a></h3>
						<p>Master of Arts in Public Administration, AB major in Psychology minor in English</p>
					</div>
				</div>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(images/deanCrim.png);">
						</div>
						<span>DEAN, CRIMINOLOGY</span>
						<h3><a href="https://www.facebook.com/antonio.dawagan.79">DR. ANTONIO A. DAWAGAN </a></h3>
						<p>Educational Attainment: Doctor of Education, Doctorate in Criminology, Master of Science in Criminology</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><span>Testimonials</span></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person1.jpg);"></div>
									<span>Mary Walker<br><small>Students</small></span>
									<blockquote>
										<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person2.jpg);"></div>
									<span>Mike Smith<br><small>Students</small></span>
									<blockquote>
										<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<div class="user" style="background-image: url(images/person3.jpg);"></div>
									<span>Rita Jones<br><small>Teacher</small></span>
									<blockquote>
										<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Map Location -->
	<div>
		<br><br>
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Bestlink Main campus Location</h2>
					<p>#1071 Brgy. Kaligayahan, Quirino Highway Novaliches Quezon City, Philippines 1123</p>
				</div>
				<iframe class="animate-box" width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Bestlink%20College%20of%20the%20Philipines&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

				<!-- <iframe class="animate-box" width="100%" height="500" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ-w1yV1awlzMRvqkkCg_6fno&key=AIzaSyAJPMvY02_WVR-UOZU0r7Brn4V4SelYi9o"></iframe> -->
	</div>

	<div id="fh5co-blog">
		<div class="container">
		<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>BCP Branches</h2>
					<p>Here are the current available branches of Bestlink College of the Philippines</p>
				</div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-img-holder" style="background-image: url(images/bulacanCamp.jpg);"></a>
						<div class="blog-text">
							<h3><a href="#">Bulacan Campus</a></h3>
							<p>IPO Road, Barangay Minuyan Proper City of San Jose Del Monte, Bulacan
							<br><br><b>Contact #: (044)797-2949</b></p>
						</div> 
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#" class="blog-img-holder" style="background-image: url(images/mainCamp.jpg);"></a>
						<div class="blog-text">
							<h3><a href="#">Main Campus</a></h3>
							<p>#1071 Brgy. Kaligayahan, Quirino Highway Novaliches Quezon City, Philippines 1123
							<br><br><b>Contact #: 417-4355</b></p>
						</div> 
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="https://www.google.com/maps/place/Bestlink+College+of+the+Philippines/@14.7259172,121.0376605,17.25z/data=!4m5!3m4!1s0x3397b0ff7eb3d621:0x437d85420878d598!8m2!3d14.726688!4d121.0372158" class="blog-img-holder" style="background-image: url(images/mvcampus2.jpg);" target="_blank"></a>
						<div class="blog-text">
							<h3><a href="https://www.google.com/maps/place/Bestlink+College+of+the+Philippines/@14.7259172,121.0376605,17.25z/data=!4m5!3m4!1s0x3397b0ff7eb3d621:0x437d85420878d598!8m2!3d14.726688!4d121.0372158" target="_blank">Millionaire’s Village Campus</a></h3>
							<p>Lot 762 cor. Topaz St. and Sapphire St., Millionaire’s Village, Novaliches Quezon City, Philippines
							<br><br><b>Contact #: 463-8787, 799-6617</b></p>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-register" style="background-image: url(images/mvcampus1.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>School Year Countdown</h2>
					<h3>Bestlink College of the Philippines</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>Limited Slot, Hurry Up!</strong></p>
					<p><a data-toggle="modal" data-target="#exampleModalLong" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
				</div>
			</div>
		</div>
	</div>


	<?php
		// footer
		include ('footer.php');
	?>

	</div>

	<div class="gototop js-top" 
	style="background: rgb(45, 108, 223); 
	-webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  border-radius: 4px;">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
		<!-- Modal -->
		<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered" role="document" >
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLongTitle">BCP Terms and Conditions</h3>
					</div>
					<div class="modal-body" style="text-align: justify; text-justify: inter-word;  overflow-y: scroll; height:750px;">
						<div style="padding: 20px;">
							<h4>Statement of Privacy Policy</h4>
							<hr>
							<b >BESTLINK COLLEGE OF THE PHILIPPINES, INC .( BCP )</b> is committed to abide by and adhere to the provisions of Philippine Republic Act No. 10173, also known as, the Data Privacy Act of 2012 and its Implementing Rules and Regulations. BCP commits itself to protect the privacy of its data subjects (individuals it deals with, current, past and prospective) as well as to ensure that the personal data gathered as provided by such subjects shall be safeguarded and secured while under its control and custody. This data privacy policy will outline the manner by which the data gathered will be properly utilized and the process of doing so; the measures to be undertaken for purposes of keeping it secure, its appropriate use and disposal when no longer deemed necessary; and provide information to the data subjects about their rights under RA#10173.
							<br>
							For the above purpose this Data Privacy Notice and Consent Form may be amended at any time without prior notice, and such amendments will be notified to you via BCP’s website or email.
							<br><br>
							<h4>Privacy Notice</h3>
							<hr>

							<h5>Information Collected</h3>
							<p>
								BCP collects, stores, and processes personal data from its current, past and prospective students, starting with the information provided at application through the information collected throughout the whole course of their study at the BCP. This will include: 
							</p>
							<ul>
								<li>Contact information, such as, name, addresses, telephone numbers, email addresses and other contact details;</li>
								<li>Personal information, such as date and place of birth, nationality, immigration status, religion, civil status, student ID, government-issued IDs, web information, recommendations and assessment forms from previous schools, etc.;</li>
								<li>Family background, including information on parents, guardians, siblings, etc.;</li>
								<li>Photographic and biometric data, such as, photos, CCTV videos, fingerprints, handwriting and signature specimens;</li>
								<li>Student's school works, including data gathered using third party online learning tools Health records, psychological evaluation results, disciplinary records, and physical fitness information;</li>
								<li>Student Cumulative Guidance Folder, which includes interviews, guidance assessments, special needs, exclusions/behavioral information, etc.;</li>
								<li>Permanent Student Academic Records, including transcripts and the academic history of the student in BCP;</li>
								<li>Student extra-curricular activities, résumés, job interview forms; and,</li>
								<li>Financial and billing information.</li>
							</ul>

							<h5>Use of Information</h3>
							<p>				
							The collected personal data is used solely for the following purposes:         
							</p>
							<ul>
								<li>Processing of admission application and student selection (and to confirm the identity of prospective students and their parents);</li>
								<li>Verifying authenticity of student records and documents;</li>
								<li>Processing of scholarship applications and its on-going requirements;</li>
								<li>Processing of enrollment and registration;</li>
								<li>Supporting student learning, and validating students’ program of study based on curriculum requirements, and other activities and experiences forming part of the student’s formation and education;</li>
								<li>Supporting the student’s well-being and providing medical services and guidance counselling;</li>
								<li>Monitoring and reporting on student progress; processing of evaluations, exam results, and grades;</li>
								<li>Monitoring and ensuring the safety of all students within the BCP campus;</li>
								<li>Processing and generating statements of accounts;</li>
								<li>Processing of application for graduation;</li>
								<li>Evaluation for board examinations;</li>
								<li>Documentation of students’ data;</li>
								<li>For accreditation, professional development of teachers and staff, and research, e.g., evaluation studies by the research desk, action research by teachers, etc.;</li>
								<li>Posting or displaying of academic and non-academic achievements within the BCP premises and/or its official website and social media accounts;</li>
								<li>Marketing and promoting BCP, its students, employees, and other academic and non-academic and/or school activities inside and outside the campus; and,</li>
								<li>Providing Library services, running an outreach program, family council purposes, job postings, practicums, internships, employment.</li>
							</ul>

							<h5>Information Sharing</h3>
							<p>							
							Personal data under the custody of BCP shall be disclosed only to authorized recipients of such data. Otherwise, we will share your personal data with third parties, other than your parents and/or guardian on record for minors, only with your consent, or when required or permitted by our policies and applicable law, such as with:               
							</p>
							<ul>	
								<li>Regulatory authorities, courts, and government agencies, e.g., Department of Education, Commission on Higher Education, etc.;</li>
								<li>The Association of Christian Schools, Colleges and University Accrediting Agency (ACSCU-AAI), a service organization which accredits academic programs that meet commonly accepted standards of quality education;</li>
								<li>Service Providers who perform services for us and help us support your learning, monitor and report on your progress, manage the operations of our school, and assess how well BCP is doing; and,</li>
								<li>Business partners and other academic linkages who provide internships and job opportunities to our graduates.</li>				
							</ul>

							<h5>Data Transfer</h3>
							<p>					
							Where BCP consider it necessary or appropriate, for the purposes of data storage, processing, providing any service or product on our behalf to you, or implementing an academic linkage program, we may transfer your personal data to third parties within or outside of the Philippines, under conditions of confidentiality and similar levels of security safeguards.                
							</p>

							<h5>Security</h3>
							<p>			
								We continue to implement organizational, administrative, technical, and physical security measures to safeguard your personal data. 
								<br><br>   			     
								Only authorized personnel have access to them, the exchange of which is facilitated through internal shared servers, email, and paper files.  
								<br><br>  			              
								Should third parties need access to your personal data, we require some form of data sharing agreement with them, in compliance with the DPA and the DPA-IRR.    
								<br><br>  	       			
								Your paper and digital files are securely stored employing physical security to safeguard the paper files and technical security to protect the digital files.                             
								</p> 
								<h5>Retention of Information</h3>
								<p>				
								We keep your paper and digital files only for as long as necessary. 
								<br><br>           
								a) The Permanent Student Academic Records are kept by the Basic Education (BED) Records Office or the Higher Education (HED) Registrar’s Office for 75 years after last graduation from BCP. 
								<br>
								b) The BED and HED Admission files are kept for five years.      
								<br>			
								c) Application forms and documents of unsuccessful applicants are kept by the Admissions Office – five years for BED and two years for HED.              
								<br>			
								d) Scholarship application forms and supporting documentation are kept by the HED Office of Student Affairs for four years, or until the scholar graduates.             
								<br>			
								e) The Student Cumulative Guidance Folders are kept by the Guidance Office for five years after graduation.             
								<br>			
								f) Student school works are kept for five years, but, in a some cases, selected student works may be retained for ten years as exemplars.             
								<br>			
								g) Student disciplinary records are stored by the Office of Student Affairs, for five years after graduation.             
								<br>			
								h) The class records are kept for one year after graduation.             
								<br> 			
								i) Non-academic records, e.g., service records for HED scholars, extra-curricular activities, emergency contact forms, etc. are kept for five years.             
								<br>   
								j) Financial and billing information are kept by the Finance Office for ten years.             
								<br>  			   
								k) The Clinic retains health records for five years after graduation.             
								<br>     
								l) CCTV cameras are the responsibility of Facilities; some cameras have memory for a month of CCTV videos, and older ones for less. The cameras run continuously on a rolling basis, where older videos are overwritten as the memory fills up.             
								<br> 
								<br> 			
								When your personal data is no longer needed, we take reasonable steps to securely destroy such information or permanently de-identify it. Paper files are securely shredded and electronic information is deleted applying <i>Secure Erase</i>
								so that this is no longer recoverable nor reproducible.        
								<br>          
							</p>
							<h5>Your rights</h3>
							<p>						
							You have the right to be informed, to object processing, access and rectification, to suspend or to withdraw your personal data, including, any such information held by third parties, with whom BCP has data sharing agreement; and be indemnified in case of damages pursuant to the provisions of the DPA and the DPA-IRR.                        
							</p>
						</div>
					</div>					
					<div class="modal-footer">				
						<button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>   
						<a type="button" class="btn btn-primary" href="UserManagement/online-enrollment.php" >I AGREE</a>     
					</div>
				</div>
			</div>
		</div>
		<!-- End of Modal -->

		<?php
			// JS
			include ('js.php');
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

