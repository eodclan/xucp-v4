<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 4.1
// *
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

xucp_secure();
secure_url();

xucp_head_logged("world",TWEETS_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_tweets']))
{
    $username = strip_tags($_POST['xucp_username']);
    $msg = strip_tags($_POST['xucp_msg']);
    $createdAt = date("Y-m-d H:i:s");

    if(empty($username)){
        $errorMsg[]=TWEETS_NOT_DONE;
    }
    else if(empty($msg)){
        $errorMsg[]=TWEETS_NOT_DONE;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO xucp_tweets (username,msg,createdAt) VALUES
																(:xucp_username,:xucp_msg,:xucp_time)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_msg'	=>$msg,
                    ':xucp_time'=>$createdAt))){

                    $doneMsg=TWEETS_DONE;
                    header("refresh:2; /vendor/usercp/dashboard/index.php");
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
										<h4 class='card-title'>".TWEETS_HEADER."</h4>
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
										<h4 class='card-title'>".TWEETS_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}