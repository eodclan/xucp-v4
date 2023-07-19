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

xucp_head_logged("user",USERPROFILECHANGE);
xucp_navi_logged();
xucp_content_logged();

if(isset($_POST['xucp_submit'])){
        $usersig = strip_tags($_REQUEST['xucp_usersig']);
        $userava = filter_input(INPUT_POST, 'xucp_userava', FILTER_SANITIZE_SPECIAL_CHARS);
        $userhp = filter_input(INPUT_POST, 'xucp_userhp', FILTER_SANITIZE_SPECIAL_CHARS);
        $userdiscordtag = filter_input(INPUT_POST, 'xucp_userdiscordtag', FILTER_SANITIZE_SPECIAL_CHARS);
        $email 	= filter_input(INPUT_POST, 'xucp_email', FILTER_SANITIZE_EMAIL);
        $language 	= filter_input(INPUT_POST, 'xucp_language', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'xucp_password', FILTER_DEFAULT);
        $user_id = $_SESSION['xucp_uname']['secure_first'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMsg[]=MSG_13;
        }
        else if(empty($password)){
            $errorMsg[]=MSG_15;
        }
        else if(strlen($password) < 6){
            $errorMsg[] = MSG_13;
        }
        else
        {
            try
            {
                if(!isset($errorMsg))
                {
                    $new_password = password_hash($password, PASSWORD_BCRYPT);
                    $insert_stmt=$db->prepare("UPDATE `xucp_accounts` SET `usersig` = :xucp_usersig, `email` = :xucp_email, `userhp` = :xucp_userhp, `language` = :xucp_language, `password` = :xucp_password, `userava` = :xucp_userava, `userdiscordtag` = :xucp_userdiscordtag WHERE `id` = :xucp_user_id");

                    if($insert_stmt->execute(array(	':xucp_usersig'	=>$usersig,
                        ':xucp_email'=>$email,
                        ':xucp_language'=>$language,
                        ':xucp_password'=>$new_password,
                        ':xucp_userhp'=>$userhp,
                        ':xucp_userava'=>$userava,
                        ':xucp_userdiscordtag'=>$userdiscordtag,
                        ':xucp_user_id'=>$user_id))){

                        $registerMsg=MSG_8;
                        header("refresh:2; ".$_SERVER['PHP_SELF']);
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
}

if(isset($errorMsg))
{
    foreach($errorMsg as $error)
    {
        echo"
        <div class='row'>
            <div class='col-xl-12'>
                <div class='card'>
                    <div class='card-header'>
                        <h4 class='card-title'>".USERPROFILECHANGE."</h4>
                    </div>
                    <div class='card-body'>
                        ".$error."
                    </div>
                </div>
            </div>
        </div>";
    }
}
if(isset($registerMsg))
{
    echo"
    <div class='row'>
        <div class='col-xl-12'>
            <div class='card'>
                <div class='card-header'>
                    <h4 class='card-title'>".USERPROFILECHANGE."</h4>
                </div>
                <div class='card-body'>
                    ".$registerMsg."
                </div>
            </div>
        </div>
    </div>";
}
echo "
                        <div class='row'>
                            <div class='col-xl-9 col-lg-8'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2'>
                                            <div class='col-sm order-2 order-sm-1'>
                                                <div class='d-flex align-items-start mt-3 mt-sm-0'>
                                                    <div class='flex-shrink-0'>
                                                        <div class='me-3'>";
                                                    $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                                    $select_stmt->execute();
                                                    $avatar=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                                    if($select_stmt->rowCount() > 0){
                                                        echo "
                                                            <img src='".htmlentities($avatar['userava'], ENT_QUOTES, 'UTF-8')."' alt='' class='rounded-circle p-1 bg-primary'>";
													}		
													echo "
                                                        </div>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>";
                                                    $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                                    $select_stmt->execute();
                                                    $user_sig=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                                    if($select_stmt->rowCount() > 0){
                                                        echo "
                                                            <h5 class='font-size-16 mb-1'>".htmlentities($user_sig['username'], ENT_QUOTES, 'UTF-8')."</h5>
                                                            <p class='text-muted font-size-13'>".xucp_bbcode_format($user_sig['usersig'])."</p>";
                                                    }
													echo "
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='card'>
							                <div class='card-body'>
                                                <ul class='nav nav-pills mb-3' role='tablist'>
                                                    <li class='nav-item'>
                                                        <a class='nav-link px-3 active' data-bs-toggle='tab' href='#overview' role='tab'>
                                                            <div class='d-flex align-items-center'>
                                                                <div class='tab-icon'><i class='bx bx-home font-18 me-1'></i></div>   
                                                                <div class='tab-title'>
                                                                    ".PROFILE_ABOUT."
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class='nav-item'>
                                                        <a class='nav-link px-3' data-bs-toggle='tab' href='#about' role='tab'>
                                                            <div class='d-flex align-items-center'>
                                                                <div class='tab-icon'><i class='bx bx-user-pin font-18 me-1'></i></div>   
                                                                <div class='tab-title'>
                                                                    ".PROFILE_SETTINGS."
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='tab-content'>
                                    <div class='tab-pane fade show active' id='overview' role='tabpanel'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <h5 class='card-title mb-0'>".PROFILE_ABOUT."</h5>
                                            </div>
                                            <div class='card-body'>
                                                <div>
                                                    <div class='pb-3'>
                                                        <div class='row'>
                                                            <div class='col-xl-2'>
                                                                <div>
                                                                    <h5 class='font-size-15'>".SIGNATUR." :</h5>
                                                                </div>
                                                            </div>
                                                            <div class='col-xl'>
                                                                <div class='text-muted'>";
                                                            $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                                            $select_stmt->execute();
                                                            $u_sig=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                                            if($select_stmt->rowCount() > 0){
                                                                echo "
                                                                    <p class='mb-2'>".xucp_bbcode_format($u_sig['usersig'])."</p>";
                                                            }
															echo "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tab-pane fade' id='about' role='tabpanel'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <h5 class='card-title mb-0'>".PROFILE_SETTINGS."</h5>
                                            </div>
                                            <div class='card-body'>
                                                <div>
                                                    <div class='pb-3'>
                                                        <div class='text-muted'>";
                                                        $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                                        $select_stmt->execute();
                                                        $profile=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                                        if($select_stmt->rowCount() > 0){
															echo "
															<form class='card' action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
																<div class='card-body'>
																	<div class='row gy-4'>
																		<div class='col-sm-6'>
																			<label class='form-label'>".EMAIL."</label>
																			<input class='form-control' type='text' name='xucp_email' placeholder='".EMAIL."' value='".htmlentities($profile['email'], ENT_QUOTES, 'UTF-8')."' required>
																		</div>
																		<div class='col-sm-6'>
																			<label class='form-label'>".PASSWORD."</label>
																			<input class='form-control' type='password' name='xucp_password' placeholder='".PASSWORD."' required>
																		</div>
																		<div class='col-md-12'>
																			<label class='form-label'>".PROFILE_PORTFOLIO_WEBSITE."</label>
																			<input class='form-control' type='text' name='xucp_userhp' placeholder='".PROFILE_PORTFOLIO_WEBSITE."' value='".htmlentities($profile['userhp'], ENT_QUOTES, 'UTF-8')."' required>
																		</div>	
																		<div class='col-md-12'>
																			<label class='form-label'>".PROFILE_PORTFOLIO_DISCORDTAG."</label>
																			<input class='form-control' type='text' name='xucp_userdiscordtag' placeholder='".PROFILE_PORTFOLIO_DISCORDTAG."' value='".htmlentities($profile['userdiscordtag'], ENT_QUOTES, 'UTF-8')."' required>
																		</div>																		
																		<div class='col-md-12'>
																			<label class='form-label'>".LANGUAGE."</label>
																			<div class='bootstrap-select form-control show-tick'>
																				<select name='xucp_language' class='form-control show-tick' required>
																					<option value=''>-- ".CHANGE_MYPROFILE_LANGUAGENOTE." --</option>
																					<option value='en'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_EN."</option>
																					<option value='de'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_DE."</option>
																				</select>
																			</div>
																		</div>
																		<div class='col-md-12'>
																			<label class='form-label'>".AVATAR."</label>
																			<input class='form-control' type='text' name='xucp_userava' placeholder='".AVATAR."' value='".htmlentities($profile['userava'], ENT_QUOTES, 'UTF-8')."'>
																		</div>									
																		<div class='col-md-12'>
																			<label class='form-label'>".SIGNATUR."</label>";
																			xucp_text_bbcode('xucp_usersig', htmlspecialchars(stripslashes($profile['usersig'])));
                                                        }
																	echo "
																		</div>
																	</div>
																</div>
																<div class='card-footer text-end'>
																    <input type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light' value='".MYPROFILESAVE."'>
																</div>
															</form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xl-3 col-lg-4'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>".PROFILE_PORTFOLIO."</h5>

                                        <div class='d-flex align-items-center mb-3'>";
                                        $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                        $select_stmt->execute();
                                        $portfolio=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                        if($select_stmt->rowCount() > 0){
                                            echo "
                                            <a href='".htmlentities($portfolio['userhp'], ENT_QUOTES, 'UTF-8')."' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
														<img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <h5 class='font-size-14 mb-1'>".PROFILE_PORTFOLIO_WEBSITE."</h5>
                                                            <p class='font-size-13 text-muted mb-0'>".htmlentities($portfolio['userhp'], ENT_QUOTES, 'UTF-8')."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                        }
											echo "
                                        </div>
                                    </div>
                                </div>
								<div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>".PROFILE_PORTFOLIO_DISCORDTAG."</h5>

                                        <div class='d-flex align-items-center mb-3'>";
                                        $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                        $select_stmt->execute();
                                        $dc_tag=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                        if($select_stmt->rowCount() > 0){
                                            echo "
                                            <a href='#' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
                                                        <img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <h5 class='font-size-14 mb-1'>".htmlentities($dc_tag['username'], ENT_QUOTES, 'UTF-8')."</h5>
                                                            <p class='font-size-13 text-muted mb-0'>".htmlentities($dc_tag['userdiscordtag'], ENT_QUOTES, 'UTF-8')."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                        }
									echo "
                                        </div>
                                    </div>
                                </div>
								<div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>".PROFILE_BANNED."</h5>

                                        <div class='d-flex align-items-center mb-3'>";
                                $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                $select_stmt->execute();
                                $ban_tag=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                if($select_stmt->rowCount() > 0){
                                    if(htmlentities($ban_tag['ban'], ENT_QUOTES, 'UTF-8') == 1) {
                                        echo "
                                            <a href='#' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
                                                        <img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <h5 class='font-size-14 mb-1'>".PROFILE_BANNED_YES."</h5>
                                                            <p class='font-size-13 text-muted mb-0'>".htmlentities($ban_tag['banReason'], ENT_QUOTES, 'UTF-8')."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                    } else {
                                        echo "
                                            <a href='#' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
                                                        <img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <h5 class='font-size-14 mb-1'>".PROFILE_BANNED_NO."</h5>
                                                            <p class='font-size-13 text-muted mb-0'>".PROFILE_BANNED_INFO."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                    }
                                }
                                echo "
                                        </div>
                                    </div>
                                </div>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>".PROFILE_WHITELIST."</h5>

                                        <div class='d-flex align-items-center mb-3'>";
                                $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
                                $select_stmt->execute();
                                $ban_tag=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                if($select_stmt->rowCount() > 0){
                                    if(htmlentities($ban_tag['whitelisted'], ENT_QUOTES, 'UTF-8') == 0) {
                                        echo "
                                            <a href='#' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
                                                        <img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <p class='font-size-13 text-muted mb-0'>".MYWHITELIST_STATUS_2."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                    } else {
                                    echo "
                                            <a href='#' class='d-flex align-items-center mb-6'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='avatar-sm flex-shrink-0 me-3'>
                                                        <img src='/res/themes/default/assets/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-primary'>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>
                                                            <p class='font-size-13 text-muted mb-0'>".MYWHITELIST_STATUS."</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>";
                                    }
                                }
                                echo "
                                        </div>
                                    </div>
                                </div>                                
							</div>";
xucp_foot_logged();