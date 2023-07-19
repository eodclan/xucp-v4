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

xucp_head_logged("detail",SUPPORT_HEADER_LIST);
xucp_navi_logged();
xucp_content_logged();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_support WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='card'>
					            <div class='card-body'>
						            <input type='hidden' name='new' value='1' />
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTUSERID."</label>
									            <div class='col-sm-12 form-control'>
                                                    " . $row["id"]. "
									            </div>
								            </div>
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTUSERNAME."</label>
									            <div class='col-sm-12 form-control'>
                                                    " . $row["username"]. "
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTSUBJECT."</label>
									            <div class='col-sm-12 form-control'>
									                ".xucp_bbcode_format($row["bug"])."
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTMSG."</label>
									            <div class='col-sm-12 form-control'>
									                ".xucp_bbcode_format($row["msg"])."									
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTDATE."</label>
									            <div class='col-sm-12 form-control'>
                                                    ".$row["posted"]."
									            </div>
								            </div>							
                                        </div>						
						            </input>
						        </div>							
					        </div>
				        </div>
                    </div>";
}
xucp_foot_logged();