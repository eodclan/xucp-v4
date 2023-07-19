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
xucp_secure_staff_check();

xucp_head_logged("user-check",STAFF_USERCONTROL);
xucp_navi_logged();
xucp_content_logged();

echo "
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".STAFF_USERCONTROLUSERID."
										</th>
										<th>
											".STAFF_USERCONTROLUSERNAME."
										</th>					  
										<th>
											".STAFF_USERCONTROLEMAIL."
										</th>				  
										<th>
											".STAFF_USERCONTROLACCOUNTWHITELIST."
										</th>
								        <th>
									        ".STAFF_BANNED_USER."
								        </th>
								        <th>
									        ".STAFF_BANNED_USER." ".STAFF_BANNED_USER_NOTE."
								        </th>								        										
										<th>
											".PROFILE_PORTFOLIO_WEBSITE."
										</th>
										<th>
											".PROFILE_PORTFOLIO_DISCORDTAG."
										</th>	
										<th>
											".STAFF_USERCONTROLOPTION."
										</th>																			
									</thead>
									<tbody>";
                                $select_stmt = $db->prepare(query: "SELECT * FROM xucp_accounts WHERE id LIKE ?");
                                $select_stmt->execute(array("%$query%"));
                                while($row = $select_stmt->fetch()) {
									echo "
										<tr>
											<td>
												" . $row["id"]. "
											</td>
											<td>
												" . $row["username"]. "
											</td>						
											<td>
												" . $row["email"]. "
											</td>
											<td>
												" . $row["whitelisted"]. "
											</td>
											<td>
												" . $row["ban"]. "
											</td>
											<td>
												" . $row["banReason"]. "
											</td>											
											<td>
												" . $row["userhp"]. "
											</td>
											<td>
												" . $row["userdiscordtag"]. "
											</td>
                                            <td>
                                                <a href='/vendor/staffcp/users/index-change-view.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                    <i class='dripicons-checkmark'></i>&nbsp;".STAFF_CHANGE_USER."
                                                </a>
                                            </td>											
										</tr>";
								}					
								echo "					  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
xucp_foot_logged();	
