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
xucp_secure_staff_check_rank();

xucp_head_logged("grid",BLOG_HEADER_2);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $title = strip_tags($_POST['xucp_title']);
    $description = strip_tags($_POST['xucp_description']);
    $createdAt = date("Y-m-d H:i:s");
    $user_id = strip_tags($_SESSION['xucp_uname']['secure_first']);

    if(empty($title)){
        $errorMsg[]=BLOG_ENTRY_NOT_WORK;
    }
    else if(empty($description)){
        $errorMsg[]=BLOG_ENTRY_NOT_WORK;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO xucp_blog VALUES (NULL, ?, ?, ? ,?)");

                if($insert_stmt->execute([$title, $description, $user_id, $createdAt])){

                    $doneMsg=BLOG_ENTRY_WORKING;
                    $Discord = new Discord();
                    $Discord->Send(DCWEBHOOK_INFO_BLOG_ADDED);
                    header("refresh:2; /vendor/usercp/blog/index.php");
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
										<h4 class='card-title'>".BLOG_HEADER_2."</h4>
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
										<h4 class='card-title'>".BLOG_HEADER_2."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}