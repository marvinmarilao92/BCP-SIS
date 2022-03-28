<?php

  include 'include/config.php';
    if(isset($_POST['action'])){

      if($_POST['action'] == "data" && isset($_POST['id'])){

          $id = mysqli_real_escape_string($link,trim($_POST["id"]));

          $result = array();
  
          $result['data'] = array();
  
          //2d holder array
          // $datain = array();

          $query ="SELECT * FROM `student_application` WHERE `id_number` = $id AND `account_status` = 'Paid'";
  
          $response = mysqli_query($link, $query);
          if($response){
            if(mysqli_num_rows($response)==1){

               while($rows = mysqli_fetch_array($response)){
                  //setting second array
                  // $datain["$rows[1]"] = array();
  
                  $index['adm_fname'] = $rows[2];
                  $index['adm_lname'] = $rows[3];
                  $index['adm_mname'] = $rows[4];
                  $index['adm_email'] = $rows[5];
                  $index['adm_contact'] = $rows[6];
                  $index['adm_add'] = $rows[7];
                  $index['adm_course'] = $rows[8];
                  $index['adm_gen'] = $rows[9];
                  $index['adm_bday'] = $rows[10];
                  $index['adm_nation'] = $rows[11];
                  $index['adm_religion'] = $rows[12];
                  $index['adm_cs'] = $rows[13];
                  
                  array_push($result["data"], $index);
                  // array_push($result['data'], $index);
                  // var_dump($index);
              }
              // $result['data'] = $datain;
              // var_dump($datain);
              $result["success"]="1";//for checking
              echo json_encode($result);
            }else{
              $result["success"]="0";//for checking
              echo json_encode($result);
            }
             
          }
      }else{
        echo ("error");
      }
        
  }
  
?>