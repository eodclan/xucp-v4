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
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /vendor/webcp/404/index.php' ) );
}
/**
 * @return void
 */
function xucp_navi_logged(): void
{
    echo "
		<div class='sidebar-wrapper' data-simplebar='true'>
			<div class='sidebar-header'>
				<div>
					<img src='/res/themes/default/assets/images/logo-icon.png' class='logo-icon' alt='logo icon'>
				</div>
				<div>
					<h4 class='logo-text'>".$_SESSION['xucp_uname']['site_settings_site_name']."</h4>
				</div>
			</div>    
			<ul class='metismenu' id='menu'>
				<li>
					<a href='javascript:;' class='has-arrow'>
						<div class='parent-icon'><i class='bx bx-home-circle'></i>
						</div>
						<div class='menu-title'>".$_SESSION['xucp_uname']['site_settings_site_name']."</div>
					</a>
					<ul>
						<li> <a href='/vendor/usercp/dashboard/index.php'><i class='bx bx-right-arrow-alt'></i>".DASHBOARD."</a>
						</li>
						<li> <a href='ts3server://".$_SESSION['xucp_uname']['site_settings_teamspeak']."'><i class='bx bx-right-arrow-alt'></i>Teamspeak</a>
						</li>						
					</ul>
				</li>
				<li>
					<a href='javascript:;' class='has-arrow'>
						<div class='parent-icon'><i class='bx bx-user-circle'></i>
						</div>
						<div class='menu-title'>".USERACCOUNT."</div>
					</a>
					<ul>
						<li> <a href='/vendor/usercp/profile/index.php'><i class='bx bx-right-arrow-alt'></i>".USERPROFILECHANGE."</a>
						</li>
						<li> <a href='/vendor/usercp/support/index.php'><i class='bx bx-right-arrow-alt'></i>".USERSUPPORT."</a>
						</li>
					</ul>
				</li>
				<li class='menu-label'>Server</li>
				<li>
					<a href='javascript:;' class='has-arrow'>
						<div class='parent-icon'><i class='bx bx-support'></i>
						</div>
						<div class='menu-title'>".USERSUPPORT."</div>
					</a>
					<ul>
						<li> <a href='/vendor/usercp/client/index.php'><i class='bx bx-right-arrow-alt'></i>".GSERVER_INFO_HEAD."</a>
						</li>
						<li> <a href='/vendor/usercp/keyboard/index.php'><i class='bx bx-right-arrow-alt'></i>".KEY_HEADER_2."</a>
						</li>
					</ul>
				</li>";
	        if(intval($_SESSION['xucp_uname']['secure_staff']) >= UC_CLASS_SUPPORTER) {
		        echo "
				<li>
					<a class='has-arrow' href='javascript:;'>
						<div class='parent-icon'><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class='menu-title'>".TEAM_CONTROL_HEADER."</div>
					</a>
					<ul>
						<li> <a href='/vendor/staffcp/team_control/index.php'><i class='bx bx-right-arrow-alt'></i>".TEAM_CONTROL_SECTION_OPEN."</a>
						</li>
					</ul>
				</li>";
            }
	        echo "
			</ul>
		</div>";
}