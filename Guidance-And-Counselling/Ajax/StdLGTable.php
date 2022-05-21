<?php session_start();
  if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getStdLGTable"]) )
  {
    $_SESSION["LogsType"] = $_GET["getStdLGTable"];
    if ($_GET["getStdLGTable"] == "Good_Moral")
    {
      echo '  <table  class="table table-hover animate__animated animate__fadeIn" style="width:100%; font-size: 14px;" id="StudentINFO">
            <thead >
                <tr style="text-align:center;">
                    <th>Student Name</th>
                    <th>Type of Logs</th>
                    <th>Purpose</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="Stdlogs">';

                        require_once 'Config.php';
                        if (isset($_SESSION["searchSTDID"]))
                        {
                          $Goodmoral = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? AND Student_ID =? ORDER BY created DESC', "Good moral", $_SESSION["searchSTDID"])->fetchAll();
                          unset($_SESSION["searchSTDID"]);
                        }
                        else
                        {
                          $Goodmoral = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =?  ORDER BY created DESC', "Good moral")->fetchAll();
                        }

                        foreach ($Goodmoral as $data) :
                                    echo '<tr style="text-align:center;" id="rmvrw'.$data["ID"].'">

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

  echo"    </tbody>
        </table>";




    }
    else if ($_GET["getStdLGTable"] == "Alumni")
    {
      echo '  <table  class="table table-hover animate__animated animate__fadeIn" style="width:100%; font-size: 14px;" id="StudentINFO">
            <thead >
                <tr style="text-align:center;">
                    <th>Student Name</th>
                    <th>Type of Logs</th>
                    <th>Purpose</th>
                    <th>Yr Graduate</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="Stdlogs">';

                        require_once 'Config.php';
                        $Alumni = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? ORDER BY created DESC', "Alumni")->fetchAll();
                        foreach ($Alumni as $data) :
                                    echo '<tr style="text-align:center;" id="rmvrw'.$data["ID"].'">

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
                                      </tr>';
                        endforeach;

  echo"    </tbody>
        </table>";
    }
    else if ($_GET["getStdLGTable"] == "Concern")
    {
      echo '  <table  class="table table-hover animate__animated animate__fadeIn" style="width:100%; font-size: 14px;" id="StudentINFO">
            <thead >
                <tr style="text-align:center;">
                    <th>Student Name</th>
                    <th>Type of Logs</th>
                    <th>Purpose</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="Stdlogs">';

                        require_once 'Config.php';
                        $Concern = $db->query(' SELECT * FROM gac_logsdata WHERE LogsType =? ORDER BY created DESC', "Concern")->fetchAll();
                        foreach ($Concern as $data) :
                                    echo '<tr style="text-align:center;" id="rmvrw'.$data["ID"].'">

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

  echo"    </tbody>
        </table>";
    }












  }
 ?>
