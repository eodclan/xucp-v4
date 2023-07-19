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

xucp_head_logged("info-square",KEY_HEADER);
xucp_navi_logged();
xucp_content_logged();

echo "
            <div class='row'>
              <div class='col-lg-12'>
                <div class='card'>
                  <div class='card-header'>
                	<h4 class='mb-0'>".KEY_HEADER."</h4>
					<p class='card-title-desc'>".KEYNOTE."</p>
                  </div>
                  <div class='card-body'>";
                $select_stmt = $db->prepare("SELECT key1, key2, key3, key4, key5, key6, key7, key8, key9, key10, key11, key12, key13, key14, key15, key16, key17, key18, key19 FROM xucp_keys WHERE id = 1");
                $select_stmt->execute();
                $key_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo"
				<form action='/app/features/staff/xucp_keyboard.php' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY1."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key1' size='50' maxlength='256' class='form-control' value='".$key_set["key1"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY2."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key2' size='50' maxlength='256' class='form-control' value='".$key_set["key2"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY3."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key3' size='50' maxlength='256' class='form-control' value='".$key_set["key3"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY4."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key4' size='50' maxlength='256' class='form-control' value='".$key_set["key4"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY5."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key5' size='50' maxlength='256' class='form-control' value='".$key_set["key5"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY6."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key6' size='50' maxlength='256' class='form-control' value='".$key_set["key6"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY7."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key7' size='50' maxlength='256' class='form-control' value='".$key_set["key7"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY8."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key8' size='50' maxlength='256' class='form-control' value='".$key_set["key8"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY9."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key9' size='50' maxlength='256' class='form-control' value='".$key_set["key9"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY10."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key10' size='50' maxlength='256' class='form-control' value='".$key_set["key10"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY11."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key11' size='50' maxlength='256' class='form-control' value='".$key_set["key11"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY12."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key12' size='50' maxlength='256' class='form-control' value='".$key_set["key12"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY13."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key13' size='50' maxlength='256' class='form-control' value='".$key_set["key13"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY14."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key14' size='50' maxlength='256' class='form-control' value='".$key_set["key14"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY15."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key15' size='50' maxlength='256' class='form-control' value='".$key_set["key15"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY16."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key16' size='50' maxlength='256' class='form-control' value='".$key_set["key16"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY17."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key17' size='50' maxlength='256' class='form-control' value='".$key_set["key17"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY18."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key18' size='50' maxlength='256' class='form-control' value='".$key_set["key18"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY19."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key19' size='50' maxlength='256' class='form-control' value='".$key_set["key19"]."' required>
							</div>	
						</div>
					</div><br />					  						
					<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
						<i class='dripicons-checkmark'></i>&nbsp;".KEYDONEBTN."
					</button>
					</submit>						
				</form>";
			}
echo "	
                                </div>
                            </div>
                        </div>
                    </div>";
xucp_foot_logged();
