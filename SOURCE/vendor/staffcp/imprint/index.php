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

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
                                </div>
                                <div class='card-body'>";
$select_stmt = $db->prepare("SELECT id, name, address, phone_number FROM xucp_imprint ORDER by id DESC LIMIT 1");
$select_stmt->execute();
$conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
									<form class='form-horizontal' action='/app/features/staff/xucp_imprint.php' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_NAME."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_name' size='50' maxlength='100' class='form-control' value='" . $conf_set["name"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_ADDRESS."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_address' size='50' maxlength='100' class='form-control' value='" . $conf_set["address"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_PHONE."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_phone_number' size='50' maxlength='100' class='form-control' value='" . $conf_set["phone_number"]. "' required>
												</div>	
											</td>
										</tr>																				
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".IMPRINT_MANAGER_DONE."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>	";
}

echo "				
                                </div>
                            </div>
                        </div>
                    </div>";
xucp_foot_logged();