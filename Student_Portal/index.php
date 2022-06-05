<?php
include('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include("includes/head.php");
?>

<body>

  <?php
  $page = 'dash';
  include("includes/nav.php");
  include("includes/sidebar.php");
  
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
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                    aria-label="Slide 6"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                    aria-label="Slide 7"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                    aria-label="Slide 8"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                    aria-label="Slide 9"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                    aria-label="Slide 10"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10"
                    aria-label="Slide 11"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../assets/img/banners/banner7.jpg" class="d-block w-100" alt="...">
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

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                <br>
              </div><!-- End Slides with indicators -->
              <!-- news feed body starts here -->

            </div><!-- End banners -->

            <!-- Department Posts -->
            <div class="col-12">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/mvcampus3.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Department Post</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Department Posts -->

            <!-- Department Posts -->
            <div class="col-12">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/mvcampus3.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Help Desk Announcement</h5>
                      <p class="card-text">Announcement and other News will be put here</p>
                      <a href="view.php?id=<?php echo $_SESSION["login_key"]; ?>" class="btn btn-light">Read More <span
                          class="text-danger">&rarr;</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/mvcampus3.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Help Desk Announcement</h5>
                      <p class="card-text">Announcement and other News will be put here</p>
                      <a href="view.php?id=<?php echo $_SESSION["login_key"]; ?>" class="btn btn-light">Read More <span
                          class="text-danger">&rarr;</span></a>
                    </div>
                  </div>
                </div>
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

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Announcement -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Recent Announcement <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Announcement must be put here <a href="#" class="fw-bold text-dark">(Highlight of the
                      Announcement)</a>
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="../assets/img/news-1.jpg" alt="">
                  <h4><a href="#">BCP News</a></h4>
                  <p>BCP news must be put here...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="../assets/img/news-2.jpg" alt="">
                  <h4><a href="#">BCP Updates</a></h4>
                  <p>BCP news must be put here...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="../assets/img/news-3.jpg" alt="">
                  <h4><a href="#">BCP News</a></h4>
                  <p>BCP Updates must be put here...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="../assets/img/news-4.jpg" alt="">
                  <h4><a href="#">BCP Updates</a></h4>
                  <p>BCP Updates must be put here...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="../assets/img/news-5.jpg" alt="">
                  <h4><a href="#">BCP News</a></h4>
                  <p>BCP news must be put here...</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>


  </main><!-- End #main -->

  <?php
  include("includes/footer.php");
  ?>

</body>
<!-- prevent you for turning back -->
<script>
(function(global) {

  if (typeof(global) === "undefined") {
    throw new Error("window is undefined");
  }

  var _hash = "!";
  var noBackPlease = function() {
    global.location.href += "#";

    // Making sure we have the fruit available for juice (^__^)
    global.setTimeout(function() {
      global.location.href += "!";
    }, 50);
  };

  global.onhashchange = function() {
    if (global.location.hash !== _hash) {
      global.location.hash = _hash;
    }
  };

  global.onload = function() {
    noBackPlease();

    // Disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function(e) {
      var elm = e.target.nodeName.toLowerCase();
      if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
        e.preventDefault();
      }
      // Stopping the event bubbling up the DOM tree...
      e.stopPropagation();
    };
  }
})(window);
</script>

</html>