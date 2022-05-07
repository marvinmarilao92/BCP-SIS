<?php
include_once 'security/newsource.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>POST</title>

<head>
  <?php include 'includes/head_ext.php'; ?>
</head>

<body>
  <?php $page = "post" ?>
  <?php include 'includes/header.php'; ?>
  <?php include 'includes/sidebar.php'; ?>

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
              <div class="row g-0">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <div class="card-title">Medical Administrator</div>
                      </div>
                      <div class="col-3 d-flex align-items-center">
                        <select class="form-select" name="" id="">
                          <option value="">Announcement</option>
                          <option value="">News & Updates</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="wrapper">
                        <textarea name="" class="form-control" id="" cols="10" rows="2"
                          placeholder="Write Something.."></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End banners -->

            <!-- Department Posts -->
            <div class="col-12">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <div class="container d-flex p-4 justify-content-center rounded">
                      <img src="../assets/img/admission.png" class="img-fluid rounded-start p-2 shadow-sm" alt="..."
                        width="128px" height="128px">
                    </div>
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


  </main>
  <?php include 'includes/footer.php';
  ?>
</body>

</html>