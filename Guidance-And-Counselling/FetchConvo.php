 <?php
                    session_start();
                    include 'Config.php';

                    if ( isset($_SESSION["KEY"]))
                    {

                        $Request = $db->query('SELECT * FROM counselrequest WHERE Request_Key = ?', $_SESSION["KEY"])->fetchArray();

                        $_SESSION["Student_ID".$_SESSION['success'].""]     = $Request["Student_ID"];
                        $_SESSION["Student_Name".$_SESSION['success'].""]   = $Request["Student_Name"];

                        $Convo = $db->query('SELECT Chat_Info, User, time(created_At) as sendTime FROM conversation WHERE Student_ID =? AND Request_Key =? AND Employee_ID=? ORDER BY ID ASC',
                        $_SESSION["Student_ID".$_SESSION['success'].""], $_SESSION["KEY"], $_SESSION["User_ID".$_SESSION['success'].""])->fetchAll();


                        foreach ($Convo as $data)
                        {
                            echo '<div class="container">';
                            if ($data["User"] != "Student")
                            {
                                echo '
                                    <div class="form-row">

                                        <div class="form-group col-md-6" ></div>

                                        <div class="form-group col-md-6   alert alert-primary" role="alert" style="margin:-1%; padding: 0%; background-color: transparent; border: none;">

                                           <div class="float-right alert alert-primary "
                                               style="
                                                   color:black;
                                                   border-radius: 50px;
                                                   padding:5px;
                                                   padding-left:20px;
                                                   padding-right:20px;
                                                   box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

                                                  ;"
                                           ><span>'.$data["Chat_Info"].'</span><br>
                                           <small class=" float-right form-text text-muted" style="font-size: 11px;">'.date_format(date_create($data["sendTime"]), 'g:ia \o\n l jS F Y').'</small></div>

                                   </div>

                                    </div> ';
                            }
                            else
                            {
                              echo '
                                 <div class="form-row">

                                      <div class="form-group col-md-6   alert alert-secondary" role="alert" style="margin:-1%; padding: 0%; background-color: transparent; border: none;">

                                             <div class="float-left alert alert-secondary "
                                                 style="
                                                     color:black;
                                                     border-radius: 50px;
                                                     padding:5px;
                                                     padding-left:20px;
                                                     padding-right:20px;
                                                     box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

                                                    ;"
                                             ><span>'.$data["Chat_Info"].'</span><br>
                                             <small class=" float-left form-text text-muted" style="font-size: 11px;">'.date_format(date_create($data["sendTime"]), 'g:ia \o\n l jS F Y').'</small></div>

                                     </div>
                                     <div class="form-group col-md-6" ></div>
                                 </div> ';
                            }
                            echo '</div>';
                        }
                            echo' <script>
                                document.getElementById("Chats").value = "";
                            </script>';
                    }
                ?>
