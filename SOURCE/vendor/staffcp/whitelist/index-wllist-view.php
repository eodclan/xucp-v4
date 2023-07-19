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

xucp_head_logged("detail",FRAGE_HEADER_2);
xucp_navi_logged();
xucp_content_logged();

$id = $_REQUEST['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_whitelist WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo"
            <div class='row'>
              <div class='col-lg-12'>
                <div class='card'>
					<div class='card-body'>
						<form class='forms-sample' name='form' method='post' action='/vendor/staffcp/whitelist/index-wllist-view.php?id=".$id."'>
                            <input type='hidden' name='new' value='1' />
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>UCP Name</label>
									<div class='col-sm-9'>
										" .$row['ucpname']. "
									</div>
								</div>
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>Charakter Name</label>
									<div class='col-sm-9'>
										" .$row['charname']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>Charakter Story</label>
									<div class='col-sm-9'>
										" .$row['charstory']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE1."</label>
									<div class='col-sm-9'>
										" .$row['frage1']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE2."</label>
									<div class='col-sm-9'>
										" .$row['frage2']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE3."</label>
									<div class='col-sm-9'>
										" .$row['frage3']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE4."</label>
									<div class='col-sm-9'>
										" .$row['frage4']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE5."</label>
									<div class='col-sm-9'>
										" .$row['frage5']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE6."</label>
									<div class='col-sm-9'>
										" .$row['frage6']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE7."</label>
									<div class='col-sm-9'>
										" .$row['frage7']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE8."</label>
									<div class='col-sm-9'>
										" .$row['frage8']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE9."</label>
									<div class='col-sm-9'>
										" .$row['frage9']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE10."</label>
									<div class='col-sm-9'>
										" .$row['frage10']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE11."</label>
									<div class='col-sm-9'>
										" .$row['frage11']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE12."</label>
									<div class='col-sm-9'>
										" .$row['frage12']. "
									</div>
								</div>							
                            </div>
						</form>
						</div>							
					</div>
				</div>
            </div>";
}
xucp_foot_logged();
