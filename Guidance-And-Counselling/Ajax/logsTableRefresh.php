<?php
require_once 'Config.php';
$DefaultData = $db->query(' SELECT * FROM gac_logsdata ORDER BY created DESC')->fetchAll();
foreach ($DefaultData as $data) :
            echo '<tr style="text-align:center;" id="rmvrw'.$data["ID"].'" >

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
              </tr>';
endforeach;
 ?>
