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
 * @param string $SITE_SUB_ICON
 * @param string $SITE_SUB_TITLE
 * @return void
 */
function xucp_head_logged(string $SITE_SUB_ICON = "", string $SITE_SUB_TITLE = ""): void
{
  // starting secure urls
  secure_url();
  // starting header section
  echo "
<!doctype html>
<html lang='".$_SESSION['xucp_uname']['site_settings_lang']."'>
<head>
	<!-- ####################################################### -->
	<!-- #   Powered by xUCP Free V4.2                         # -->
	<!-- #   Copyright (c) 2023 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='icon' href='/res/themes/default/assets/images/favicon-32x32.png' type='image/png' />
	<link href='/res/themes/default/assets/plugins/simplebar/css/simplebar.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/metismenu/css/metisMenu.min.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/highcharts/css/highcharts-white.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/css/pace.min.css' rel='stylesheet' />
	<script src='/res/themes/default/assets/js/pace.min.js'></script>
	<link href='/res/themes/default/assets/css/bootstrap.min.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/bootstrap-extended.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/custom.min.css' rel='stylesheet'>	
	<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/app.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/icons.css' rel='stylesheet'>
	<title>".$_SESSION['xucp_uname']['site_settings_site_name']." | ".$SITE_SUB_TITLE."</title>";
	header("X-XSS-Protection: 1; mode=block");
	header("X-Content-Type-Options: nosniff");
	header("Strict-Transport-Security: max-age=31536000");
	header("Referrer-Policy: origin-when-cross-origin");
	header("Expect-CT: max-age=7776000, enforce");
	header("Feature-Policy: vibrate 'self'; user-media *; sync-xhr 'self'");
	echo"
</head>
<body class='".$_SESSION['xucp_uname']['site_settings_themes']."'>
	<div class='wrapper'>
		<header>
			<div class='topbar d-flex align-items-center'>
				<nav class='navbar navbar-expand'>
					<div class='mobile-toggle-menu'><i class='bx bx-menu'></i></div>
					<div class='search-bar flex-grow-1'><div class='position-relative search-bar-box'><i class='bx bx-".$SITE_SUB_ICON."'></i> ".$SITE_SUB_TITLE."</div></div>
					<div class='user-box dropdown'>
						<a class='d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
							<div class='user-info ps-3'>
								<p class='user-name mb-0'><i class='lni lni-angle-double-down'></i>&nbsp;".$_SESSION['xucp_uname']['secure_uname']."</p>
							</div>
						</a>
						<ul class='dropdown-menu dropdown-menu-end'>					
							<li><a class='dropdown-item' href='' data-bs-toggle='modal' data-bs-target='#logoutModal'><i class='bx bx-log-out-circle'></i><span>".SITE_LOGOUT."</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>";
}

/**
 * @param string $SITE_SUB_ICON
 * @param string $SITE_SUB_TITLE
 * @return void
 */
function xucp_head_no_logged(string $SITE_SUB_ICON = "", string $SITE_SUB_TITLE = ""): void
{
  // starting secure urls  
  secure_url();
  // starting header section  
  echo "
<!doctype html>
<html lang='".$_SESSION['xucp_uname']['site_settings_lang']."'>
<head>
	<!-- ####################################################### -->
	<!-- #   Powered by xUCP Free V4.2                         # -->
	<!-- #   Copyright (c) 2023 DerStr1k3r.                    # -->
	<!-- #   All rights reserved.                              # -->
	<!-- ####################################################### -->
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='icon' href='/res/themes/default/assets/images/favicon-32x32.png' type='image/png' />
	<link href='/res/themes/default/assets/plugins/simplebar/css/simplebar.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/plugins/metismenu/css/metisMenu.min.css' rel='stylesheet' />
	<link href='/res/themes/default/assets/css/pace.min.css' rel='stylesheet' />
	<script src='/res/themes/default/assets/js/pace.min.js'></script>
	<link href='/res/themes/default/assets/css/bootstrap.min.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/bootstrap-extended.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/custom.min.css' rel='stylesheet'>	
	<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/app.css' rel='stylesheet'>
	<link href='/res/themes/default/assets/css/icons.css' rel='stylesheet'>
	<title>".$_SESSION['xucp_uname']['site_settings_site_name']." | ".$SITE_SUB_TITLE."</title>";
	header("X-XSS-Protection: 1; mode=block");
	header("X-Content-Type-Options: nosniff");
	header("Strict-Transport-Security: max-age=31536000");
	header("Referrer-Policy: origin-when-cross-origin");
	header("Expect-CT: max-age=7776000, enforce");
	header("Feature-Policy: vibrate 'self'; user-media *; sync-xhr 'self'");
echo "
</head>
<body class='".$_SESSION['xucp_uname']['site_settings_themes']."'>
	<div class='wrapper'>
		<header>
			<div class='topbar d-flex align-items-center'>
				<nav class='navbar navbar-expand bg-no-logged rounded fixed-top rounded-0 shadow-sm'>
					<a class='navbar-brand' href='/index.php'>
						<img src='/res/themes/default/assets/images/logo-img.png' width='140' alt='' />
					</a>
					<div class='mobile-toggle-menu'><i class='bx bx-menu'></i>
					</div>
					<div class='top-menu ms-auto'><i class='bx bx-".$SITE_SUB_ICON."'></i> ".$SITE_SUB_TITLE."</div>
					<div class='user-box dropdown'>
						<a class='d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
							<img src='/res/themes/default/assets/images/logo-icon.png' class='user-img'>
							<div class='user-info ps-3'>
								<p class='user-name mb-0'>Navigation</p>
							</div>
						</a>
						<ul class='dropdown-menu dropdown-menu-end'>
							<li><a class='dropdown-item' href='/vendor/webcp/home/index.php'><i class='bx bx-home'></i><span>".HOME_NOLOGGED."</span></a>
							</li>
							<li><a class='dropdown-item' href='/vendor/webcp/rules/index.php'><i class='bx bx-message-detail'></i><span>".RULES."</span></a>
							</li>
							<li>
								<div class='dropdown-divider mb-0'></div>
							</li>							
							<li><a class='dropdown-item' href='/vendor/webcp/imprint/index.php'><i class='bx bx-detail'></i><span>".IMPRINT_HEADER."</span></a>
							</li>																					
							<li>
								<div class='dropdown-divider mb-0'></div>
							</li>							
							<li><a class='dropdown-item' href='' data-bs-toggle='modal' data-bs-target='#loginModal'><i class='bx bx-log-in'></i><span>".LOGIN."</span></a>
							</li>
							<li><a class='dropdown-item' href='' data-bs-toggle='modal' data-bs-target='#registerModal'><i class='bx bx-lock-open-alt'></i><span>".REGISTER."</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>";
}