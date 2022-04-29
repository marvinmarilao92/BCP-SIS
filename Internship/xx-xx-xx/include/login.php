<?php

include 'config.php';

if(isset($_POST['submit'])){
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $username = validate($_POST['email']);
    $uname = validate($_POST['email']);
    $mypass = validate(md5($_POST['password']));
    $_SESSION['logged']=false;
    if(empty($_POST['email']) || empty($_POST['password'])){
    $error="INVALID";
    }
    else{
        
        $res = mysqli_query($link,"SELECT *FROM ims_users WHERE ims_username='$uname' and ims_login='$mypass'")or die("ERROR ".mysql_error());
        $rop = mysqli_num_rows($res);
        $row = mysqli_fetch_array($res);


        if($rop == "0")
            {
                header("location: ../index.php?t=#auth=invalid_user_or_password#");
                die();

            }
            else{
                foreach($res as $row){
                    $role = $row['ims_role'];
                    $stats = $row['ims_status'];
                    if ( $role ==  "student" and $stats == "active" )
                    {
                        $token = rand(1,1000000000000);
                        $h = md5($token);
                        $toks = rand(1,1000000000);
                        $j = md5($tok);
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['myid'] = $row['ims_uid'];
                        $_SESSION['myu'] = $row['ims_username'];
                        $_SESSION['mycode'] = $row['ims_coursecode'];
                        $_SESSION['myfname'] = $row['ims_fname'];
                        $_SESSION['mymname'] = $row['ims_mname'];
                        $_SESSION['mylname'] = $row['ims_lname'];
                        $_SESSION['myemail'] = $row['ims_email'];
                        $_SESSION['mydate'] = $row['ims_bdate'];
                        $_SESSION['myphone'] = $row['ims_phone'];
                        $_SESSION['myabout'] = $row['ims_about'];
                        $_SESSION['myedu'] = $row['ims_education'];
                        $_SESSION['mytitle'] = $row['ims_title'];
                        $_SESSION['myrole'] = $row['ims_role'];
                        $_SESSION['mycity'] = $row['ims_city'];
                        $_SESSION['mystatus'] = $row['ims_status'];
                        $_SESSION['mystreet'] = $row['ims_street'];
                        $_SESSION['myzip'] = $row['ims_zip'];
                        $_SESSION['mycourse'] = $row['ims_course'];
                        $_SESSION['myskills'] = $row['ims_skills'];
                        $_SESSION['mycountry'] = $row['ims_country'];
                        $_SESSION['mydesc'] = $row['ims_about'];
                        $_SESSION['myavatar'] = $row['ims_avatar'];
                        $_SESSION['lastlogin'] = $row['ims_lastlogin'];
                        
                        header("location: ../x/profile.php?t=".$h."+zero-fill?=".$j."+".$row['ims_status']);
                        die();
                    }
                    else if ( $role ==  "admin" and $stats == "active" )
                    {
                        $token = rand(1,1000000000000);
                        $h = md5($token);
                        $toks = rand(1,1000000000);
                        $j = md5($tok);
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['myid'] = $row['ims_uid'];
                        $_SESSION['myu'] = $row['ims_username'];
                        $_SESSION['mycode'] = $row['ims_coursecode'];
                        $_SESSION['myfname'] = $row['ims_fname'];
                        $_SESSION['mymname'] = $row['ims_mname'];
                        $_SESSION['mylname'] = $row['ims_lname'];
                        $_SESSION['myemail'] = $row['ims_email'];
                        $_SESSION['mydate'] = $row['ims_bdate'];
                        $_SESSION['myphone'] = $row['ims_phone'];
                        $_SESSION['myabout'] = $row['ims_about'];
                        $_SESSION['myedu'] = $row['ims_education'];
                        $_SESSION['mytitle'] = $row['ims_title'];
                        $_SESSION['myrole'] = $row['ims_role'];
                        $_SESSION['mycity'] = $row['ims_city'];
                        $_SESSION['mystatus'] = $row['ims_status'];
                        $_SESSION['mystreet'] = $row['ims_street'];
                        $_SESSION['myzip'] = $row['ims_zip'];
                        $_SESSION['mycourse'] = $row['ims_course'];
                        $_SESSION['myskills'] = $row['ims_skills'];
                        $_SESSION['mycountry'] = $row['ims_country'];
                        $_SESSION['mydesc'] = $row['ims_about'];
                        $_SESSION['myavatar'] = $row['ims_avatar'];
                        $_SESSION['lastlogin'] = $row['ims_lastlogin'];
                        
                        header("location: ../xxx-ds-ds/login.php?t=".$h."+zero-fill?=".$j."+".$row['ims_status']);
                        die();
                    }
                    else if ( $role == "coordinator" and $stats == "verified")
                    {
                        $token = rand(1,1000000000000);
                        $h = md5($token);
                        $toks = rand(1,1000000000);
                        $j = md5($tok);
                        session_start();
                        $_SESSION['logged'] = true;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['myid'] = $row['ims_uid'];
                        $_SESSION['myfname'] = $row['ims_fname'];
                        $_SESSION['mymname'] = $row['ims_mname'];
                        $_SESSION['mylname'] = $row['ims_lname'];
                        $_SESSION['myemail'] = $row['ims_email'];
                        $_SESSION['mycode'] = $row['ims_coursecode'];
                        $_SESSION['mydate'] = $row['ims_bdate'];
                        $_SESSION['myphone'] = $row['ims_phone'];
                        $_SESSION['myabout'] = $row['ims_about'];
                        $_SESSION['myedu'] = $row['ims_education'];
                        $_SESSION['mytitle'] = $row['ims_title'];
                        $_SESSION['myrole'] = $row['ims_role'];
                        $_SESSION['mycity'] = $row['ims_city'];
                        $_SESSION['mystreet'] = $row['ims_street'];
                        $_SESSION['myzip'] = $row['ims_zip'];
                        $_SESSION['mycourse'] = $row['ims_course'];
                        $_SESSION['myskills'] = $row['ims_skills'];
                        $_SESSION['mycountry'] = $row['ims_country'];
                        $_SESSION['mydesc'] = $row['ims_about'];
                        $_SESSION['myavatar'] = $row['ims_avatar'];
                        $_SESSION['lastlogin'] = $row['ims_lastlogin'];
                        
                        header("location: ../y/profile.php?t=".$h."+zero-fill?=".$j."+".$row['ims_status']);
                        die();
                    }
                    
                    else
                    {
                        header("location: ../index.php?t=#error=account_not_verified");
                        exit();
                    }
                }
                
            }
                
            mysqli_close($link);
    }
    }


?>