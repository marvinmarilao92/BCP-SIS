<?php
include('includes/session.php');
?>
   <!DOCTYPE html>
   <html lang="en">
   <title>Frequently Ask Questions</title>
   <head>
   <?php include ('includes/head.php');//css connection?>
   </head>

   <body>
   <?php include ('includes/nav.php');//Design for  Header?>
   <?php $page = 'faqs';include ('includes/sidebar.php');//Design for sidebar?>



  
    
 

  <main id="main" class="main col-lg-offset-4">
  <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="GET" action="search.php">
      <input type="text" name="k"  placeholder="How can we help?" title="Enter search keyword" autocomplete = "off" style="width:500px;" class="form-control" />
        <button type="submit" name = " " class="btn btn-outline-primary" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    


<div class="pagetitle">
  <h1>Frequently Ask Question</h1>
  <nav>
    
  </nav>
</div><!-- End Page Title -->
<div class="card-body">
             

             <div class="accordion accordion-flush" id="faq-group-1">

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                     How to pay books?
                   </button>
                 </h2>
                 <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                    Buying and paying books is done to cashier just go to the main campus of bestlink and you can check what window is for
                    books and you can fall in line to pay for it . prices of books may vary according to your course.
                   </div>
                 </div>
               </div>

             
               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                     How can i check for my remaining balance?
                   </button>
                 </h2>
                 <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                   You can check your remaining balance in the MIS they are the one handling your account just give your school id and follow their instruction next.
                   </div>
                 </div>
               </div>

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                     Is Cashier available on Sunday
                   </button>
                 </h2>
                 <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                    students cashier is only available on Monday-Saturday from 8am -5pm 
                   </div>
                 </div>
               </div>

               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                    What to do if i cant login to my LMS account 
                   </button>
                 </h2>
                 <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                    if you are having trouble of logging into your lms account you can directly contact your adviser for that matter and follow his/her instruction carefully. 
                   </div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-6" type="button" data-bs-toggle="collapse">
                     How much is the downpayment for exam?
                   </button>
                 </h2>
                 <div id="faqsOne-6" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                  The minimum downpayment for exam is 1000 pesos you can pay that in the cashier or you can pay it in the AUB bank or hello money app make sure that you specify it for examination payment
                   </div>
                 </div>
               </div>
               <div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-7" type="button" data-bs-toggle="collapse">
                     What to do if your grades is not put in the portal?
                   </button>
                 </h2>
                 <div id="faqsOne-7" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                     If you find out that you have a missing grades in the student portal your can ask your teacher/professor about it so that you can clarify your concern
                     about it.
                   </div>
                 </div>
               </div><div class="accordion-item">
                 <h2 class="accordion-header">
                   <button class="accordion-button collapsed" data-bs-target="#faqsOne-8" type="button" data-bs-toggle="collapse">
                     How much is the tuition fee of bestlink?
                   </button>
                 </h2>
                 <div id="faqsOne-8" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                   <div class="accordion-body">
                    There is no tuition fee at bestlink it is only miscellaneous 4975
                 </div>
               </div>
             

             </div>

           </div>
         </div><!-- End F.A.Q Group 1 -->
<section class="section">
  <div class="row align-items-top">
    <div class="col-lg-4">

      <!-- Default Card -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Question not in the faqs section?</h5>
          if happens that your concern is not in the list or you can't find it in the search bar
        you can submit a ticket in regards for your question so that we can help or assist you.<br><br>
        <a href="new_ticket.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-outline-primary">Get Started <span class="text-danger">&rarr;</span></a>
        </div>
        
      </div><!-- End Default Card -->


     

    </div>

   

 
</section>
 
  </main><!-- End #main -->

 <!-- ======= Footer ======= -->

 <?php include 'includes/footer.php'; ?>
  <?php include ("view_ticket.php"); ?>

 <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6295e69eb0d10b6f3e74e4fa/1g4copmuv';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
  </body>
</html>