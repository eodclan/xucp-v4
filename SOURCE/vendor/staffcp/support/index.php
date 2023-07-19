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

if (isset($_GET["support"])) $support = trim(htmlentities($_GET["support"]));
elseif (isset($_POST["support"])) $support = trim(htmlentities($_POST["support"]));
else $support = "view";

xucp_head_logged("detail",SUPPORT_HEADER_LIST);
xucp_navi_logged();
xucp_content_logged();

if ($support == "remoticket") {
	if(isset($_POST['sup_rem'])){
        $select_stmt = $db->prepare("DELETE FROM xucp_support");
        $select_stmt->execute();
        $support=$select_stmt->fetch(PDO::FETCH_ASSOC);

        if($select_stmt->rowCount() > 0){
            echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".SUPPORT_HEADER_LIST."</h4>
									</div>
									<div class='card-body'>
										".SUPPORTDELETEINFO."
									</div>
								</div>
							</div>
						</div>";
        }
	}		           		
}						
echo"
                        <div class='row align-items-center'>
                            <div class='col-md-6'>
                                <div class='mb-3'>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3'>
                                    <div>
                                        <form method='post' action='".$_SERVER['PHP_SELF']."?support=remoticket' enctype='multipart/form-data'>
                                            <div class='d-flex flex-wrap gap-3 align-items-center'>
                                                <button type='submit' name='sup_rem' class='btn btn-light'><i class='bx bx-plus me-1'></i>".SUPPORTDELETE2."</submit>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>						
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-body'>
										<div class='table-responsive'>
											<table class='table'>
												<thead class='text-primary'>
													<th>
														".SUPPORTUSERID."
													</th>
													<th>
														".SUPPORTUSERNAME."
													</th>					  
													<th>
														".SUPPORTSUBJECT."
													</th>				  
													<th>
														".SUPPORTDATE."
													</th>
													<th>
														".SUPPORTOPTIONS."
													</th>																	  
												</thead>
												<tbody>";
                                                $select_stmt = $db->prepare("SELECT * FROM xucp_support WHERE id LIKE ?");
                                                $select_stmt->execute(array("%$query%"));
                                                while($support = $select_stmt->fetch()) {
													echo"					
													<tr>
														<td>
															".htmlentities($support['id'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."
														</td>						
														<td>
															".htmlentities($support['bug'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".htmlentities($support['posted'], ENT_QUOTES, 'UTF-8')."
														</td>
                                                        <td>
                                                            <a href='/vendor/staffcp/support/index-view.php?id=".htmlentities($support['id'], ENT_QUOTES, 'UTF-8')."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                                <i class='dripicons-checkmark'></i>&nbsp;".SUPPORTOPTIONS_VIEW."
                                                            </a>
                                                        </td>																			
													</tr>";
											    }
										        echo"									  
												</tbody>
											</table>
										</div>		  
									</div>
								</div>
							</div>
						</div>";
xucp_foot_logged();
