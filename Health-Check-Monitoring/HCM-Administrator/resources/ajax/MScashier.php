<?php
  
  require_once '../../security/newsource.php';

    $search = $_GET['searchID'];
    $result = $db->query('SELECT * FROM ms_cashier WHERE id_number = ?', $_GET["searchID"])->fetchArray();
    if(isset($result['id_number'])){  ?>
        <form action="" method= "POST" >
          <div class="card p-4">
            <div class"card-body">
              <div class="row">
                <div class="col p-2">
                  <input type="hidden" name ="id_number" id= "id_number" value ="<?php echo $result["id_number"] ?>">
                  <h3><?php echo $result["id_number"] ?></h3>
                </div>
                <div class="col p-2">
                  <input type="hidden" name = "course" id= "course" value ="<?php echo $result["course"] ?>">
                  <h3 class ="text-end text-danger"><?php echo $result["course"] ?></h3>
                </div>
              </div><hr>
              <div class="row">
                <div class="col p-2">
                <input type="hidden" name = "name" id= "name" value ="<?php echo $result["name"] ?>">
                  <h3><?php echo $result["name"] ?></h3>
                </div>
                <div class="col p-2">
                <?php 
                  require_once "timezone.php";
                  $result2 = $db->query('SELECT * FROM ms_schedule WHERE course = ?', $result['course'])->fetchArray();
                  $to = date("Y-m-d H:i:s", strtotime($result2['sched_to']));
                  $from = date("Y-m-d H:i:s", strtotime($result2['sched_from']));
                  $newDatefrom = date("F j, Y g:i a", strtotime($result2['sched_from']));
                  $newDateto = date("F j, Y g:i a", strtotime($result2['sched_to']));
                  if($result['year'] == $result2['yr_lvl']){
                    if($time <= $to && $time >= $from) { ?>
                      <input type="hidden" name = "power" id= "power" value ="able">
                  <?php  } else { ?>
                      <input type="hidden" name = "power" id= "power" value ="unable">
                    <?php } 
                    } else { ?>
                      <input type="hidden" name = "power" id= "power" value ="unable">
                  <?php  }
                  ?> 
                  <input type="hidden" name = "date" id= "date" value ="<?php echo $result["date"] ?>">
                  <input type="hidden" name = "payment" id= "payment" value ="<?php echo $result["payment"] ?>">
                  <h3 class = "text-end" ><?php echo $result["payment"] ?>&nbsp&nbsp<?php echo $result["date"] ?></h3>
                </div>
                <div class= "row"> 
                  <div class="col">
                    <p class = "text-end" >From : <?php echo $newDatefrom; ?></p>
                    <p class = "text-end" >To : <?php echo $newDateto; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </form>
<?php } else { ?>
      <div class="row p-4">
      <div class="alert alert-danger">No Records Found</div>
      </div>
   <?php  }
  ?>        