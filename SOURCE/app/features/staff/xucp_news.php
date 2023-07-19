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
xucp_secure_supleader_check();

xucp_head_logged("detail",NEWS_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $title_config_uid 	= 1;
    $title = strip_tags($_REQUEST['xucp_title']);
    $title_de 	= strip_tags($_REQUEST['xucp_title_de']);
    $title_content 	= strip_tags($_REQUEST['xucp_content']);
    $title_content_de 	= strip_tags($_REQUEST['xucp_content_de']);

    if(empty($title)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_de)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_content)){
        $errorMsg[]=MSG_20;
    }
    else if(empty($title_content_de)){
        $errorMsg[]=MSG_20;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_news` SET `title` = :xucp_title, `title_de` = :xucp_title_de, `content` = :xucp_content, `content_de` = :xucp_content_de WHERE `id` = ".$title_config_uid);

                if($insert_stmt->execute(array(	':xucp_title'	=>$title,
                    ':xucp_title_de'=>$title_de,
                    ':xucp_content'=>$title_content,
                    ':xucp_content_de'=>$title_content_de))){

                    $doneMsg=MSG_21;

                    header("refresh:2; /vendor/staffcp/news/index.php");
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
										<h4 class='card-title'>".NEWS_HEADER."</h4>
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
										<h4 class='card-title'>".NEWS_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}