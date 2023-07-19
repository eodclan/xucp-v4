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

xucp_head_logged("detail",SITECONFIG_HEADER);
xucp_navi_logged();
xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $site_config_uid 	= 1;
    $site_online 			= strip_tags($_REQUEST['xucp_site_online']);
    $site_name 			= strip_tags($_REQUEST['xucp_site_name']);
    $site_lang  			= strip_tags($_REQUEST['xucp_site_lang']);
    $site_dl_section 		= strip_tags($_REQUEST['xucp_site_dl_section']);
    $site_rage_section 	= strip_tags($_REQUEST['xucp_site_rage_section']);
    $site_altv_section 	= strip_tags($_REQUEST['xucp_site_altv_section']);
    $site_fivem_section 	= strip_tags($_REQUEST['xucp_site_dl_section']);
    $site_redm_section 	= strip_tags($_REQUEST['xucp_site_fivem_section']);
    $site_teamspeak 		= strip_tags($_REQUEST['xucp_site_teamspeak']);
    $site_gservername 	= strip_tags($_REQUEST['xucp_site_gserver_name']);
    $site_gserverip 		= strip_tags($_REQUEST['xucp_site_gserver_ip']);
    $site_gserverport 	= strip_tags($_REQUEST['xucp_site_gserver_port']);
    $site_themes 			= strip_tags($_REQUEST['xucp_site_themes']);

    if(empty($site_online)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_name)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_dl_section)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_teamspeak)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_gservername)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_gserverip)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_gserverport)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else if(empty($site_themes)){
        $errorMsg[]=SITECONFIG_ERROR;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_config` SET `site_online` = :xucp_site_online, `site_name` = :xucp_site_name, `site_dl_section` = :xucp_site_dl_section, `site_rage_section` = :xucp_site_rage_section, `site_altv_section` = :xucp_site_altv_section, `site_fivem_section` = :xucp_site_fivem_section, `site_redm_section` = :xucp_site_redm_section, `site_teamspeak` = :xucp_site_teamspeak, `site_gservername` = :xucp_site_gserver_name, `site_gserverip` = :xucp_site_gserver_ip, `site_gserverport` = :xucp_site_gserver_port, `site_lang` = :xucp_site_lang, `site_themes` = :xucp_site_themes WHERE `id` = ".$site_config_uid);

                if($insert_stmt->execute(array(
                    ':xucp_site_online'	=>$site_online,
                    ':xucp_site_name'=>$site_name,
                    ':xucp_site_lang'=>$site_lang,
                    ':xucp_site_dl_section'=>$site_dl_section,
                    ':xucp_site_rage_section'=>$site_rage_section,
                    ':xucp_site_altv_section'=>$site_altv_section,
                    ':xucp_site_fivem_section'=>$site_fivem_section,
                    ':xucp_site_redm_section'=>$site_redm_section,
                    ':xucp_site_teamspeak'=>$site_teamspeak,
                    ':xucp_site_gserver_name'=>$site_gservername,
                    ':xucp_site_gserver_ip'=>$site_gserverip,
                    ':xucp_site_gserver_port'=>$site_gserverport,
                    ':xucp_site_themes'=>$site_themes))){

                    $doneMsg=SITECONFIG_DONE;
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
										<h4 class='card-title'>".SITECONFIG_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$error."
									</div>
								</div>
							</div>
						</div>";
    }
}
if(isset($doneMsg))
{
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".SITECONFIG_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}

echo "	
					<div class='row'>
						<div class='col-lg-12'>
							<div class='card'>
								<div class='card-body'>";
                $select_stmt = $db->prepare("SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_teamspeak, site_lang, site_gservername, site_gserverip, site_gserverport from xucp_config ORDER by id DESC LIMIT 1");
                $select_stmt->execute();
                $conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo "
						<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITECONFIG_ONLINE."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_online' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_ONLINE_INFO." --</option>
												<option value='1'>".SITECONFIG_ONLINE_ONLINE."</option>
												<option value='0'>".SITECONFIG_ONLINE_OFFLINE."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITECONFIG_THEMES."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_themes' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_THEMES_INFO." --</option>
												<option value='bg-theme bg-theme2'>".SITECONFIG_THEMES_BLACK."</option>																																			
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_NAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_name' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_NAME."' value='" . $conf_set["site_name"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_LANG."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
										    <select name='xucp_site_lang' class='form-control show-tick' required>
												<option value=''>-- ".CHANGE_MYPROFILE_LANGUAGENOTE." --</option>
												<option value='en'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_EN."</option>
												<option value='de'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_DE."</option>
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_TEAMSPEAK."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_teamspeak' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_TEAMSPEAK."' value='" . $conf_set["site_teamspeak"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_DOWNLOAD_SECTION."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_dl_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_DOWNLOAD_SECTION."' value='" . $conf_set["site_dl_section"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gserver_name' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERNAME."' value='" . $conf_set["site_gservername"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERIP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gserver_ip' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERIP."' value='" . $conf_set["site_gserverip"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERPORT."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gserver_port' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERPORT."' value='" . $conf_set["site_gserverport"]. "' required>
										</div>
									</div>
								</div>
							</div>								
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_RAGEMP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_rage_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_ALTV."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_altv_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_FIVEM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_fivem_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_REDM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_redm_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div><hr />							
							<div class='row clearfix'>
								<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>   
								    <input type='submit'  name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light' value='".STAFF_USERCONTROLSAVE."'>
								</div>
							</div>
						</form>";
				}					

		echo "		  			
                                </div>
                            </div>
                        </div>
                    </div>";
  xucp_foot_logged();	
