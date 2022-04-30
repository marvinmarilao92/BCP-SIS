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
       



 


  

  <main id="main" class="main">
  <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="GET" action="search.php">
      <input type="text" name="k"  placeholder="Search here" title="Enter search keyword" autocomplete = "off" style="width:500px;" class="form-control" />
        <button type="submit" name = " " class="btn btn-outline-primary" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    
   
<section>

    <div class="pagetitle">
      <h1>Frequently Asked Questions</h1>
      
    </div>
     
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
                     Go to the cashier in the main campus of bestlink and you can see the window where you can pay books.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                     Where i can get my new ID
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      You can contact your adviser to get your new ID because they are the one who's in charge for that.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      how can i access other module?
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                     You can access thru clicking other module page.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                      Is Cashier available on weekend
                    </button>
                  </h2>
                  <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                     Cashier is available on Monday-Saturday
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                     where i can buy uniform?
                    </button>
                  </h2>
                  <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                     You can go to the main campus and buy uniform in the cashier
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-6" type="button" data-bs-toggle="collapse">
                      where is bestlink located?
                    </button>
                  </h2>
                  <div id="faqsOne-6" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                    Quirino Hwy, Novaliches, Quezon City, Metro Manila
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-7" type="button" data-bs-toggle="collapse">
                      Where is the library located?
                    </button>
                  </h2>
                  <div id="faqsOne-7" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      The new library is located at MV campus at 4th floor
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
             <!-- F.A.Q Group 1 -->
             <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cashier Info</h5>

              <div class="accordion accordion-flush" id="faq-group-1">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-1" type="button" data-bs-toggle="collapse">
                      Graduation fee
                    </button>
                  </h2>
                  <div id="faqsOne-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      All graduating students are required to pay for graduation fee. it is a one-time, non-transferable fee that is added to the students account when he/she intends to participate in the commencement ceremony. the stuents diploma, TOR, Certificate of graduation an other pertent documents shall not be released to graduates with outstanding balances. 
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-2" type="button" data-bs-toggle="collapse">
                      School Event 
                    </button>
                  </h2>
                  <div id="faqsOne-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Since the students are free from tuition, all approved school activities that need funding. they should pay directly to the cashier required fees.  
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-3" type="button" data-bs-toggle="collapse">
                      Assesment fees
                    </button>
                  </h2>
                  <div id="faqsOne-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      Students who will undergo National competency Examination under TESDA program shall pay an assessment and review fee directly to the cashier.<br>
                      Official reciept(O.R) must be secured and presented to the assessment office for the assessment form. Candidates shall bring the following requirements.<br>
                      - 3pcs. Passport-size picture with white background<br>
                      - Long brown enveloped    
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-4" type="button" data-bs-toggle="collapse">
                     Retured checks
                    </button>
                  </h2>
                  <div id="faqsOne-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      For clearing purposes, check payments should be made at least a week before the examination<br><br>
                      check payment by students with a record of bouncing/dishonored checks will no longer be accepted.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsOne-5" type="button" data-bs-toggle="collapse">
                      Personal Check of sponsor 
                    </button>
                  </h2>
                  <div id="faqsOne-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-1">
                    <div class="accordion-body">
                      The school will not accept the personal check sponsor in behalf of their student beneficiary.
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 1 -->

        </div>
</section>
<section>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Ticket</h5>
    <h6 class="card-subtitle mb-2 text-muted">Submit here!</h6>
    <p class="card-text">Please be mindful of your ticket</p>
     <a href = "new_ticket.php?id=<?php echo $_SESSION["login_key"];?>" class="btn btn-outline-primary">click here</a>
    
  </div>
</div>
</section>
 
  </main><!-- End #main -->

 <!-- ======= Footer ======= -->

 <?php include 'includes/footer.php';
 include ("view_ticket.php");
 ?>

  </body>
</html>