<?php 
 require_once 'Config.php';
 $result = $db->query('SELECT * FROM ms_incidents_logs WHERE id = ?', $_GET["showID"] )->fetchArray();
?>
<div class="row g-4">
  <div class="col">
    <label for="">ID number</label>
    <input class= "form-control" type = "text" id = "id_number" value = "<?php echo $result['id_number'] ?>" disabled>
  </div>
  <div class="col">
    <label for="">Full Name</label>
    <input class= "form-control" type = "text" id = "fullname" value = "<?php echo $result['fullname'] ?>" disabled>
  </div>
</div>
<div class="row pt-4">
  <fieldset class="border p-1">
    <legend class="float-none w-auto p-2">Medical Records:</legend>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Medical Examination Report
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <?php require_once 'Config.php';  $HCMSresult = $db->query('SELECT * FROM hcms_student_records WHERE stud_id = ?', $result['id_number'])->fetchArray();

                  if (isset($HCMSresult['assess_date']))
                  {
                      echo'   <div class="row">
                                <div class="col">
                                  <input class= "form-control" type="text" value = "'.$HCMSresult['assess_date'].'" disabled>
                                  <input class= "form-control" type="text" value = "'.$HCMSresult['remarks'].'" disabled>
                                </div>
                                <div class="col d-flex justify-content-center">
                                  <a title = "view" class="btn btn-danger" href ="resources/ajax/hcmpdf.php?file='.$HCMSresult['file_id'].'"><i class="bx bxs-file-pdf"></i>&nbspView</a>
                                  <button name = "download" class="btn btn-warning" value = ""><i class="bx bxs-download"></i>&nbspDownload</button>
                                </div>
                              </div>
                              ';
                  }
                  else
                  { ?>
                <div class="alert alert-danger">No Records Found</div>  
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Health Services
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <?php require_once 'Config.php';  $HCMSservice = $db->query('SELECT * FROM hcms_services WHERE id_number = ?', $result['id_number'])->fetchAll();

    foreach ($HCMSservice as $HSservice) {
            if (isset($HSservice['date']))
            {
              
                echo'   <hr><div class="row">
                          <div class="col">
                            <input class= "form-control" type="text" value = "'.$HSservice['date'].'" disabled>
                            <input class= "form-control" type="text" value = "'.$HSservice['service'].'" disabled>
                          </div>
                          <div class="col d-flex justify-content-center">
                            <button name = "view" class="btn btn-danger" value = ""><i class="bx bxs-file-pdf"></i>&nbspView</button>
                            <button name = "download" class="btn btn-warning" value = ""><i class="bx bxs-download"></i>&nbspDownload</button>
                          </div>
                        </div>
                        ';
              
            } else  { ?>
            <div class="alert alert-danger">No Records Found</div>  
            <?php }} ?>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
</div>
<div class="form-group">
  <div class="row pt-4">
    <div class="col ">
      <div class="form-control p-3">
        <label for="">Consultant</label>
        <input class= "form-control" type = "text" id = "role" value = "<?php echo $result['cons_name'] ?>" disabled>
      </div>
    </div>
    <div class="col">
      <div class="form-control p-3">
        <label for="">Role</label>
        <input class= "form-control" type = "text" id = "role" value = "<?php echo $result['cons_role'] ?>" disabled>
      </div>
    </div>
    <div class="col">
    <div class="form-control p-3">
        <label for="">Date</label>
        <input class= "form-control" type = "text" id = "role" value = "<?php echo $result['cons_date'] ?>" disabled>
      </div>
    </div>
  </div>
</div>
