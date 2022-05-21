

<?php session_start();

                    include  'db.php';
                    define('DB_SERVER', '31.220.110.2');
                    define('DB_USERNAME', 'u692894633_sis_cluster6a');
                    define('DB_PASSWORD', '?kZ]!w7?k+1');
                    define('DB_NAME', 'u692894633_SIS_C6A');
                    $db = new databaseFunction(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                    $studentData = $db->query(' SELECT  * FROM counselrequest AS Counsel
                                                INNER JOIN gacs_referral AS ref
                                                ON Counsel.Request_KEY = ref.Refferal_Key
                                                WHERE Counsel.Status = "Pending" ORDER BY Counsel.Schedule')->fetchAll();

                    foreach ($studentData as $data) :
                        $date = date_create($data['Schedule']);

                            if ($data["Referral_KEY"] == "")
                            {
                                echo '<tr style="text-align:center;">
                                        <td><a href="ConandAss.php?id='.$_SESSION['success'].'&PreviewImage='.$data['Request_KEY'].'"><img src="Referral_Image/'.$data['Referral_Slip'].'"  width="35" height="35" style="border-radius: 50px; border-bottom: 2px solid #036ffc; "></a></td>
                                        <td>'.$data['Student_ID'].'</td>
                                        <td>'.date_format($date, 'g:ia \o\n l jS F Y').'</td>
                                        <td>'.$data['Status'].'</td>

                                        <td style="" id="TDbutton">
                                            <a href="ConandAss.php?id='.$_SESSION['success'].'&CAChats='.$data['Request_KEY'].'"  class="btn btn-info"    style="background-color: #6699ff" id="chats" ><i class="bi bi-chat-square-quote"></i></a>
                                            <a href="ConandAss.php?id='.$_SESSION['success'].'&CAUpdate='.$data['Request_KEY'].'" class="btn btn-secondary" style="background-color: #ccffff;"><i class="bi bi-pin-angle-fill" style="color:black;"></i></a>
                                            <a href="ConandAss.php?id='.$_SESSION['success'].'&CADelete='.$data['Request_KEY'].'" class="btn btn-danger"  style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
                                        </td>
                                  </tr>';
                            }

                    endforeach;


//                    <script type="text/javascript">
//            function AppointmentData(){
//              const xhttp = new XMLHttpRequest();
//              xhttp.onload = function(){
//                document.getElementById("AppointmentData").innerHTML = this.responseText;
//              }
//              xhttp.open("GET", "Ajax/AppointmentData.php");
//              xhttp.send();
//            }
//
//            setInterval(function(){ AppointmentData();}, 1);
//        </script>
?>
