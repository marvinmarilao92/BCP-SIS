<?php session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getStdLGrecords"]))
  {

    require_once 'Config.php';
    if ($_SESSION["LogsType"] == "Good_Moral")
    {

      $Goodmoral = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? AND Student_ID=?', "Good moral" , $_GET["getStdLGrecords"])->fetchAll();
      foreach ($Goodmoral as $data) :
                  echo '<tr style="text-align:center;" class="animate__animated animate__fadeInUp" id="rmvrw'.$data["ID"].'" >

                            <td>'.$data["Student_Name"].'</td>
                            <td>'.$data["LogsType"].'</td>
                            <td>'.$data["Visit_Purpose"].'</td>
                            <td>';
                              if (isset($data["created"])) { echo '<i class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i class="bi bi-x-circle"  style="color: red;"></i>'; }
                    echo'   </td>
                            <td id="icon'.$data["ID"].'">';
                              if (isset($data["updated"])) { echo '<i  class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i  class="bi bi-x-circle"  style="color: red;"></i>'; }
                    echo   '</td>
                            <td  id="TDbutton">
                            <a Role="button" id="Chngicon"  onclick="changeIcon('.$data["ID"].',';
                            echo "'icon".$data["ID"]."'";
                    echo')"
                            class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                            <a Role="button" id="dlrw"  onclick="removeTableDataLG('.$data["ID"].',';
                            echo "'rmvrw".$data["ID"]."'";
                    echo')"
                            class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>




                            </td>
                      </tr>';   $_SESSION["SStudent_ID"] = $data["Student_ID"]; $_SESSION["SLogsType"] = $data["LogsType"];
      endforeach;
    }
   if ($_SESSION["LogsType"] == "Alumni")
   {
     $Alumni = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? AND Student_ID=?', "Alumni", $_GET["getStdLGrecords"])->fetchAll();
     foreach ($Alumni as $data) :
                 echo '<tr style="text-align:center;" class="animate__animated animate__fadeInUp" id="rmvrw'.$data["ID"].'" >

                         <td>'.$data["Student_Name"].'</td>
                         <td>'.$data["LogsType"].'</td>
                         <td>'.$data["Visit_Purpose"].'</td>
                         <td>'.$data["Year_Graduate"].'</td>
                         <td>';
                           if (isset($data["created"])) { echo '<i class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i class="bi bi-x-circle"  style="color: red;"></i>'; }
                 echo'   </td>
                         <td id="icon'.$data["ID"].'">';
                           if (isset($data["updated"])) { echo '<i  class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i  class="bi bi-x-circle"  style="color: red;"></i>'; }
                 echo   '</td>
                         <td  id="TDbutton">
                         <a Role="button" id="Chngicon"  onclick="changeIcon('.$data["ID"].',';
                         echo "'icon".$data["ID"]."'";
                 echo')"
                         class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                         <a Role="button" id="dlrw"  onclick="removeTableDataLG('.$data["ID"].',';
                         echo "'rmvrw".$data["ID"]."'";
                 echo')"
                         class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>




                         </td>
                   </tr>';  $_SESSION["SStudent_ID"] = $data["Student_ID"]; $_SESSION["SLogsType"] = $data["LogsType"];
     endforeach;
   }
   if ($_SESSION["LogsType"] == "Concern")
   {
     $Concern = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? AND Student_ID=?', "Concern" , $_GET["getStdLGrecords"])->fetchAll();
     foreach ($Concern as $data) :
                 echo '<tr style="text-align:center;" class="animate__animated animate__fadeInUp" id="rmvrw'.$data["ID"].'" >

                         <td>'.$data["Student_Name"].'</td>

                         <td>'.$data["LogsType"].'</td>
                         <td>'.$data["Visit_Purpose"].'</td>
                         <td>';
                           if (isset($data["created"])) { echo '<i class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i class="bi bi-x-circle"  style="color: red;"></i>'; }
                 echo'   </td>
                         <td id="icon'.$data["ID"].'">';
                           if (isset($data["updated"])) { echo '<i  class="bi bi-check2-circle" style="color: green;"></i>'; } else { echo '<i  class="bi bi-x-circle"  style="color: red;"></i>'; }
                 echo   '</td>
                         <td  id="TDbutton">
                         <a Role="button" id="Chngicon"  onclick="changeIcon('.$data["ID"].',';
                         echo "'icon".$data["ID"]."'";
                 echo')"
                         class="btn btn-warning" style="background-color: #f5e282;"><i class="bi bi-box-arrow-right" style="color:#4a4945;"></i></a>

                         <a Role="button" id="dlrw"  onclick="removeTableDataLG('.$data["ID"].',';
                         echo "'rmvrw".$data["ID"]."'";
                 echo')"
                         class="btn btn-danger" style="background-color: #ff6666;"><i class="bi bi-trash" style="color:#4a4945;"></i></a>




                         </td>
                   </tr>';  $_SESSION["SStudent_ID"] = $data["Student_ID"]; $_SESSION["SLogsType"] = $data["LogsType"];
     endforeach;
   }
  }
 ?>
