<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.3
// * 
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

xucp_secure();
secure_url();
xucp_secure_staff_check_rank();

xucp_head_logged("user-plus",ADDUSER_SYSTEM_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_adduser']))
{
    $username	= strip_tags($_REQUEST['xucp_username']);
    $email		= strip_tags($_REQUEST['xucp_email']);
    $password	= strip_tags($_REQUEST['xucp_password']);

    if(empty($username)){
        $errorMsg[]=ADDUSER_USERNAME_NOT_WORK;
    }
    else if(empty($email)){
        $errorMsg[]=ADDUSER_EMAIL_NOT_WORK;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg[]=ADDUSER_EMAIL_NOT_WORK;
    }
    else if(empty($password)){
        $errorMsg[]=ADDUSER_PASSWORD_NOT_WORK;
    }
    else if(strlen($password) < 6){
        $errorMsg[] = ADDUSER_PASSWORD_NOT_WORK;
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
                $errorMsg[]=ADDUSER_USERNAME_NOT_WORK;
            }
            else if($row["email"]==$email){
                $errorMsg[]=ADDUSER_EMAIL_NOT_WORK;
            }
            else if(!isset($errorMsg))
            {
                $new_password = password_hash($password, PASSWORD_BCRYPT);

                $insert_stmt=$db->prepare("INSERT INTO xucp_accounts (username,email,password) VALUES
																(:xucp_username,:xucp_email,:xucp_password)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_email'	=>$email,
                    ':xucp_password'=>$new_password))){

                    $doneMsg=ADDUSER_DONE;
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
        echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".ADDUSER_SYSTEM_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$error."
									</div>
								</div>
							</div>
						</div>";
    }
}
if(isset($doneMsg))
{
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".ADDUSER_SYSTEM_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".ADDUSER_SYSTEM_HEADER."</h4>
                                </div>
                                <div class='card-body'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".ADDUSER_USERNAME."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_username' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".ADDUSER_EMAIL."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_email' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>					  
											<td>
												<h6>
													".ADDUSER_PASSWORD."
												</h6>
												<div class='input-group'>
													<input type='password' name='xucp_password' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>						
										</tr>                      					  
										<tr>					  
											<td>
												<br />
												<button type='submit' name='xucp_adduser' class='btn btn-primary w-100 waves-effect waves-light'>
													".ADDUSER_SUBMIT."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>					
                                </div>
                            </div>
                        </div>
                    </div>";
xucp_foot_logged();