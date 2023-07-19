<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 4.2
// * 
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

secure_url();

xucp_head_no_logged("shape-circle",REGISTER);
xucp_content_no_logged();

if(isset($_REQUEST['xucp_signup']))
{
    $username	= strip_tags($_REQUEST['xucp_username']);
    $email		= strip_tags($_REQUEST['xucp_email']);
    $password	= strip_tags($_REQUEST['xucp_password']);

    if(empty($username)){
        $errorMsg[]=MSG_14;
    }
    else if(empty($email)){
        $errorMsg[]=MSG_13;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg[]=MSG_13;
    }
    else if(empty($password)){
        $errorMsg[]=MSG_15;
    }
    else if(strlen($password) < 6){
        $errorMsg[] = MSG_13;
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT username, email FROM xucp_accounts 
										WHERE username=:xucp_username OR email=:xucp_email");

            $select_stmt->execute(array(':xucp_username'=>$username, ':xucp_email'=>$email));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($row["username"]==$username){
                $errorMsg[]=MSG_16;
            }
            else if($row["email"]==$email){
                $errorMsg[]=MSG_13;
            }
            else if(!isset($errorMsg))
            {
                $new_password = password_hash($password, PASSWORD_BCRYPT);

                $insert_stmt=$db->prepare("INSERT INTO xucp_accounts (username,email,password) VALUES
																(:xucp_username,:xucp_email,:xucp_password)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_email'	=>$email,
                    ':xucp_password'=>$new_password))){

                    $registerMsg=MSG_9;
                    $Discord = new Discord();
                    $Discord->Send(DCWEBHOOK_INFO_REGISTER_1 ." ".$username." ".DCWEBHOOK_INFO_REGISTER_2);
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

if(isset($errorMsg))
{
    foreach($errorMsg as $error)
    {
        echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".REGISTER."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".$error."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
    }
}
if(isset($registerMsg))
{
        echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".REGISTER."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".$registerMsg."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
}
xucp_foot_no_logged();