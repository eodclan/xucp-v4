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

xucp_secure();
secure_url();

xucp_head_logged("help-circle",USERSUPPORT);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $username = strip_tags($_REQUEST['xucp_username']);
    $msg 	= strip_tags($_REQUEST['xucp_msg']);
    $bug 	= strip_tags($_REQUEST['xucp_bug']);

    if(empty($username)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($msg)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($bug)){
        $errorMsg[]=MSG_10;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO `xucp_support` (username,msg,bug) VALUES
																(:xucp_username,:xucp_msg,:xucp_bug)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_msg'	=>$msg,
                    ':xucp_bug'	=>$bug))){

                    $doneMsg=SUPPORTADDDONE;
                    $Discord = new Discord();
                    $Discord->Send(DCWEBHOOK_INFO_SUPPORT_TICKET_ADDED ." ".$msg);

                    header("refresh:2; /vendor/usercp/support/index.php");
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
										<h4 class='card-title'>".USERSUPPORT."</h4>
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
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
