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
xucp_head_no_logged("home-circle",HOME_NOLOGGED);
xucp_content_no_logged();

echo "
                <div class='row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center'>
                    <div class='col-xl-8 text-center'>
                        <div class='card'>
                            <div class='card-header'><h2>".WELCOMETO." ".$_SESSION['xucp_uname']['site_settings_site_name']."</h2></div>
                            <div class='card-body'>
                                <p>".INDEXTEXT."</p>
                            </div>
                        </div>
                    </div>
                </div>";
$select_stmt = $db->prepare("SELECT * FROM xucp_news");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $title_field = "title";
    $content_field = "content";
    if(isset($_SESSION['xucp_uname']['secure_lang']) && $_SESSION['xucp_uname']['secure_lang'] == 'de'){
        $title_field = "title_de";
        $content_field = "content_de";
    }
    $id = $row['id'];
    $title = $row[$title_field];
    $content = $row[$content_field];
    $short_content = substr($content, 0, 600);

    echo "
                <div class='row row-cols-2 row-cols-lg-4 row-cols-xl-10 justify-content-center'>
                    <div class='col-xl-8 text-center'>
                        <div class='card'>
                            <div class='card-header'><h2>".NEWS." ".$title."</h2></div>
                            <div class='card-body'>
                                <p>".xucp_bbcode_format($short_content)."</p>
                            </div>
                        </div>
                    </div>
                </div>";
}
xucp_foot_no_logged();
