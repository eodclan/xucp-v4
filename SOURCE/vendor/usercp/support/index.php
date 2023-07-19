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

$select_stmt = $db->prepare("SELECT * FROM xucp_accounts  WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
$select_stmt->execute();
$support=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'>".SUPPORTADDTICKET1."</p>
									</div>
									<div class='card-body'>
										<form action='/app/features/user/xucp_support.php' method='post' enctype='multipart/form-data'>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTUSERNAME."
														<small class='text-muted'>".SUPPORTUSERINFO1."</small>
													</h6>
													<div class='input-group'>
														<input type='text' name='xucp_username' size='50' maxlength='60' class='form-control' value='".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."' required>
													</div>	
												</td>
											</tr>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTSUBJECT."
														<small class='text-muted'>".SUPPORTUSERINFO2."</small>
													</h6>
													<div class='input-group'>
														<input type='text' name='xucp_bug' size='50' maxlength='60' class='form-control' required>
													</div>	
												</td>
											</tr>
											<tr>					  
												<td>
													<h6 class='title'>
														".SUPPORTMSG."
														<small class='text-muted'>".SUPPORTUSERINFO3."</small>
													</h6>
													<div class='input-group'>";
														xucp_text_bbcode('xucp_msg', htmlspecialchars(stripslashes($support['msg'])));
												echo"
													</div>	
												</td>						
											</tr>
											<br />
											<tr>					  
												<td>						
													<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
														<i class='dripicons-checkmark'></i>&nbsp;".SUPPORTSAVE."
													</button>
													</submit>
												</td>							
											</tr>				  						
										</form>
									</div>
								</div>
							</div>
						</div>";
}
xucp_foot_logged();
