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

xucp_head_no_logged("shape-circle",LOGIN);
xucp_content_no_logged();

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['xucp_login'])){
    $username	=strip_tags($_REQUEST["xucp_username"]);
    $password	=strip_tags($_REQUEST["xucp_password"]);

    if(empty($username)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($password)){
        $errorMsg[]=MSG_11;
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT * FROM xucp_accounts WHERE username=:xucp_username");
            $select_stmt->execute(array(':xucp_username'=>$username));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($select_stmt->rowCount() > 0)
            {
                if($username==$row["username"])
                {
                    if(password_verify($password, $row["password"]))
                    {
                        $_SESSION['xucp_uname'] = [
                            'secure_first' => $row["id"],
							'secure_uname' => $row["username"],
                            'secure_uavatar' => $row["userava"],
                            'secure_granted' => "granted",
                            'secure_staff' => $row["adminlevel"],
                            'secure_lang' => $row["language"],
                            'secure_ban_status' => $row["ban"],
                            'secure_key' => hash(SITE_LOGIN_SECURE_ALGO, SITE_LOGIN_SECURE_ALGO_ENCRYPT)
                        ];
                        $loginMsg = MSG_27;
                        $Discord = new Discord();
                        $Discord->Send(DCWEBHOOK_INFO_LOGIN_1 ." ".$row["username"]." ".DCWEBHOOK_INFO_LOGIN_2);
                        header("refresh:1; /vendor/usercp/dashboard/index.php");
                    }
                    else
                    {
                        $errorMsg[]=MSG_11;
                    }
                }
                else
                {
                    $errorMsg[]=MSG_10;
                }
            }
            else
            {
                $errorMsg[]=MSG_11;
            }
        }
        catch(PDOException $e)
        {
            $e->getMessage();
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
										<h3 class=''>".LOGIN."</h3>
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
if(isset($loginMsg))
{
        echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".LOGIN."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".$loginMsg."
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