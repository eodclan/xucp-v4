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

xucp_head_no_logged("message-detail",RULES);
xucp_content_no_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_rules");
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
	$short_content = substr($content, 0, 100000);
	echo "
						<div class='container py-2'>
							<div class='row'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title text-center'>".$title."</h4>
									</div>
									<div class='card-body'>							
								        ".xucp_bbcode_format($short_content)."
							        </div>
						        </div>
                            </div>
                        </div>";
}
xucp_foot_no_logged();	
