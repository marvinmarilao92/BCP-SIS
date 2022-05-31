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


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    
       
  
       
<style type="text/css">
  

  /*ChatBot*/
  .chat_icon{
    position: fixed;
    bottom: 50px;
    
    right: 30px;
    z-index: 1000;
    padding: 0;
    font-size: 50px;
    color: yellowgreen;
    cursor: pointer;
  }
  .chat_box{
    width: 540px;
    height: 79vh;
    position: fixed;
    bottom: 100px;
    right: 30px;
    background:#dedede;
    z-index: 1000;
    transition: all 0.3s ease-out;
    transform: scaleY(0);
  }
  .chat_box.active{
    transform: scaleY(1);
  }
  #messages{
    padding: 20px;
  }
  .my-conv-form-wrapper textarea{
    height: 30px;
    overflow: hidden;
    resize: none;
  }
  .hidden{
    display: none !important;
  }
  .scroll {
    overflow-x: auto;
  }

  </style>
    
 

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
    <!-- ChatBot -->
    <div class="chat_icon">
  <i class="bi bi-chat-dots-fill" aria-hidden="true"></i>
</div>
<div class="chat_box">
  <div class="my-conv-form-wrapper">
    <form action="" method="GET" class="hidden">
      
      <select data-conv-question="Hi! Welcome to chat bot of help desk How can I help you?" name="category">
        <option value="WebDevelopment">What is the purpose of this system?</option>
        <option value="DigitalMarketing">How can i sumbit my concern?</option>
       
      </select>
      <div data-conv-fork="category">
        <div data-conv-case="WebDevelopment">
          <input type="text" name="domainName" data-conv-question="This system is for you student for your concern and question regarding or your problem in school">    
        </div>
        <div data-conv-case="WebDevelopment">
          <input type="text" name="domainName" data-conv-question="for you to have a platform which you can send your concern">    
        </div>
        <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="You can submit your concern in the contact us section and there you can submit your concern">
        </div>
        <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="choose which department you want to send your concern">
        </div>
        <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="Dont hesitate to ask my dear student we are here to help">
        </div>
        <div data-conv-case="DigitalMarketing" data-conv-fork="first-question2">
          <input type="text" name="companyName" data-conv-question="Because this system is design for you!">
        </div>
      </div>
      <input type="text" name="companyName" data-conv-question="I'm still learning i'm sorry if i can't answer all of your question">
      

      <!--input type="text" data-conv-question="Hi {name}, <br> It's a pleasure to meet you." data-no-answer="true">

      <input data-conv-question="Enter your e-mail" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" name="email" required placeholder="What's your e-mail?"-->

      <select data-conv-question="This is the end of our conversation i'm sorry">
        <option value="Yes">Exit</option>
      </select>

    </form>
  </div>
</div>
<!-- ChatBot end -->         

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

 <!-- ChatBot -->
 <link rel="stylesheet" type="text/css" href="chat_bot/css/jquery.convform.css">
    <script type="text/javascript" src="chat_bot/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="chat_bot/js/jquery.convform.js"></script>
    <script type="text/javascript" src="chat_bot/js/custom.js"></script>
  </body>
</html>