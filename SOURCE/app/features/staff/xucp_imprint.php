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
xucp_secure_staff_check_rank();

xucp_head_logged("book",IMPRINT_MANAGER_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $site_config_uid 	= 1;
    $name = strip_tags($_POST['xucp_name']);
    $address = strip_tags($_POST['xucp_address']);
    $phone_number = strip_tags($_POST['xucp_phone_number']);

    if(empty($name)){
        $errorMsg[]=IMPRINT_NOT_DONE;
    }
    else if(empty($address)){
        $errorMsg[]=IMPRINT_NOT_DONE;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_imprint` SET `name` = :xucp_name, `address` = :xucp_address, `phone_number` = :xucp_phone_number WHERE `id` = ".$site_config_uid);

                if($insert_stmt->execute(array(	':xucp_name'	=>$name,
                    ':xucp_address'=>$address,
                    ':xucp_phone_number'=>$phone_number))){

                    $doneMsg=IMPRINT_DONE;
                    header("refresh:2; /vendor/staffcp/imprint/index.php");
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
										<h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
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
										<h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
