<?php

date_default_timezone_set('Asia/Manila');

            if(isset($_POST['submit']))
            {
                to_pay_exist();
            }else{


            }
            
            function to_pay_exist()
            {
                try{

                    function validate($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    require '../includes/conn.php';	
			  	    require 'uniq.php';
                    $date = date('d-m-Y h:i A ');
                    $payee = 'BESTLINK COLLEGE PHIL.,INC.';
                    $py_ref_no = 'PYMT22'.get_rand_numbers(13).'';

                    $sname = validate($_POST['studname']);
                    $sno = validate($_POST['studnum']);
                    $p_desc = validate($_POST['pyf']);
                    $p_amnt = validate($_POST['amount']);
                    $p_rmks = validate($_POST['remarks']);
                    
                    $sql = "INSERT INTO ims_dummy_cashier_transc(py_ref_no,py_payee,s_name,s_id,p_desc,p_amount,p_remarks)
                            values('$py_ref_no','$payee','$sname','$sno','$p_desc','$p_amnt','$p_rmks')";
                    

                    $in = mysqli_query($conn,$sql);
                


                    if($in)
                    {
                        
                        $get = password_hash($p_desc, PASSWORD_DEFAULT);
                        header("Location: ../index?success=Payment Done , Thank You !");
      				    die();

                    }else
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }


                }
                catch(PDOException $e)
		        {
		            
		        }
            }


?>