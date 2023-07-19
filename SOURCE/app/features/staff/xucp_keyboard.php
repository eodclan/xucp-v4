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

xucp_head_logged("info-square",KEY_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $key_config_uid 	= 1;
    $key1 	= strip_tags($_REQUEST['xucp_key1']);
    $key2 	= strip_tags($_REQUEST['xucp_key2']);
    $key3 	= strip_tags($_REQUEST['xucp_key3']);
    $key4 	= strip_tags($_REQUEST['xucp_key4']);
    $key5 	= strip_tags($_REQUEST['xucp_key5']);
    $key6 	= strip_tags($_REQUEST['xucp_key6']);
    $key7 	= strip_tags($_REQUEST['xucp_key7']);
    $key8 	= strip_tags($_REQUEST['xucp_key8']);
    $key9 	= strip_tags($_REQUEST['xucp_key9']);
    $key10 	= strip_tags($_REQUEST['xucp_key10']);
    $key11 	= strip_tags($_REQUEST['xucp_key11']);
    $key12 	= strip_tags($_REQUEST['xucp_key12']);
    $key13 	= strip_tags($_REQUEST['xucp_key13']);
    $key14 	= strip_tags($_REQUEST['xucp_key14']);
    $key15 	= strip_tags($_REQUEST['xucp_key15']);
    $key16 	= strip_tags($_REQUEST['xucp_key16']);
    $key17 	= strip_tags($_REQUEST['xucp_key17']);
    $key18 	= strip_tags($_REQUEST['xucp_key18']);
    $key19 	= strip_tags($_REQUEST['xucp_key19']);

    if(empty($key1)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key2)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key3)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key4)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key5)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key6)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key7)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key8)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key9)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key10)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key11)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key12)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key13)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key14)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key15)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key16)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key17)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key18)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key19)){
        $errorMsg[]=KEYNOTE;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_keys` SET `key1` = :xucp_key1, `key2` = :xucp_key2, `key3` = :xucp_key3, `key4` = :xucp_key4, `key5` = :xucp_key5, `key6` = :xucp_key6, `key7` = :xucp_key7, `key8` = :xucp_key8, `key9` = :xucp_key9, `key10` = :xucp_key10, `key11` = :xucp_key11, `key12` = :xucp_key12, `key13` = :xucp_key13, `key14` = :xucp_key14, `key15` = :xucp_key15, `key16` = :xucp_key16, `key17` = :xucp_key17, `key18` = :xucp_key18, `key19` = :xucp_key19 WHERE `id` = ".$key_config_uid);

                if($insert_stmt->execute(array(	':xucp_key1'	=>$key1,
                    ':xucp_key2'	=>$key2,
                    ':xucp_key3'	=>$key3,
                    ':xucp_key4'	=>$key4,
                    ':xucp_key5'	=>$key5,
                    ':xucp_key6'	=>$key6,
                    ':xucp_key7'	=>$key7,
                    ':xucp_key8'	=>$key8,
                    ':xucp_key9'	=>$key9,
                    ':xucp_key10'	=>$key10,
                    ':xucp_key11'	=>$key11,
                    ':xucp_key12'	=>$key12,
                    ':xucp_key13'	=>$key13,
                    ':xucp_key14'	=>$key14,
                    ':xucp_key15'	=>$key15,
                    ':xucp_key16'	=>$key16,
                    ':xucp_key17'	=>$key17,
                    ':xucp_key18'	=>$key18,
                    ':xucp_key19'	=>$key19))){

                    $doneMsg=KEYDONE;
                    header("refresh:2; /vendor/staffcp/keyboard/index.php");
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
										<h4 class='card-title'>".KEY_HEADER."</h4>
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
										<h4 class='card-title'>".KEY_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
