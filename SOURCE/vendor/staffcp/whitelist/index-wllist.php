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

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

xucp_head_logged("detail",FRAGE_HEADER_2);
xucp_navi_logged();
xucp_content_logged();

echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='card'>
									<div class='card-body'>
										<table class='table'>
											<thead>
												<tr>
													<th>ID</th>
													<th>Username</th>
													<th>Charakter Name</th>
													<th>Option</th>
												</tr>
											</thead>
											<tbody>";
										$select_stmt = $db->prepare(query: "SELECT * FROM xucp_whitelist WHERE id LIKE ?");
										$select_stmt->execute(array("%$query%"));
										while($row = $select_stmt->fetch()) {
											echo"		
												<tr>
													<td>".$row['id']."</td>
													<td>".$row['ucpname']."</td>
													<td>".$row['charname']."</td>
													<td>
														<a href='/vendor/staffcp/whitelist/index-wllist-view.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
															<i class='dripicons-checkmark'></i>&nbsp;".FRAGE_VIEW."
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
