<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'doctT'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Document Types</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Document types</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="">
  
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">           
              <div class="form-group col-md-1 btn-lg"   data-bs-toggle="modal" data-bs-target="#verticalycentered"style="float: right;">
              <br>
                  <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#Department" >
                   Add DocType
                  </button>
              </div> 
              <div class="form-group col-md-2 btn-lg"   data-bs-toggle="modal" data-bs-target="#verticalycentered"style="float: left;">
                  <h5 class="card-title">Records</h5>

              </div>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" WIDTH="85%">CATEGORY</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td WIDTH="85%">Brandon Jacob</td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td WIDTH="85%">Brandon Jacob</td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td WIDTH="85%">Brandon Jacob</td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td WIDTH="85%">Brandon Jacob</td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td WIDTH="85%">Brandon Jacob</td>
                    <td><button type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                  </tr>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
      
    </section>

  </main><!-- End #main -->

   <!-- Create Document Modal -->
   <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Create Document</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="card" style="margin: 10px;">
                        <div class="card-body">
                          <h2 class="card-title">Fill all neccessary info</h2>
                            <!-- Fill out Form -->
                            <form class="row g-3">
                               <div class="col-md-12">
                                  <input type="text" class="form-control" placeholder="Your Name">
                               </div>
                               <div class="col-md-6">
                                  <input type="email" class="form-control" placeholder="Email">
                               </div>
                               <div class="col-md-6">
                                <input type="password" class="form-control" placeholder="Password">
                               </div>
                               <div class="col-12">
                                <input type="text" class="form-control" placeholder="Address">
                               </div>
                               <div class="col-md-6">
                                <select id="inputState" class="form-select">
                                  <option selected>Office...</option>
                                  <option>...</option>
                                </select>
                               </div>
                               <div class="col-md-6">
                                <select id="inputState" class="form-select">
                                  <option selected>Staff...</option>
                                  <option>...</option>
                                </select>
                               </div>
                               <div class="col-md-12">
                               <div class="col-md-12">
                                <input class="form-control" type="file" id="formFile">
                               </div>
                               </div>
                            </form><!-- End No Labels Form -->
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
     </div><!-- End Create Document Modal-->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>