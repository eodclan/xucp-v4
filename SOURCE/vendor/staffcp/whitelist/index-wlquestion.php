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

xucp_head_logged("detail",WHITELIST_HEADER);
xucp_navi_logged();
xucp_content_logged();

$select_stmt = $db->prepare("SELECT frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12 FROM xucp_config WHERE id = 1");
$select_stmt->execute();
$conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
echo "
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='card'>
                                <div class='card-body'>				  
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE1."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage1'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE2."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage2'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE3."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage3'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE4."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage4'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE5."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage5'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE6."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage6'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE7."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage7'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE8."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage8'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
                                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE9."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage9'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE10."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage10'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE11."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage11'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>
				                    <div class='form-group'>
					                    <div class='card-title'>".FRAGE12."</div>
					                    <label class='col-sm-12 col-form-label'>".htmlentities($conf_set['frage12'], ENT_QUOTES, 'UTF-8')."</label>
				                    </div>";
}
echo "
                                </div>
                            </div>
                        </div>
                    </div>";
xucp_foot_logged();	
