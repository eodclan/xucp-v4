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
// ************************************************************************************//
// * E-Mail System
// ************************************************************************************//
const SITE_EMAIL = "noreplay@xxx.de";
// ************************************************************************************//
// * Site Login Secure System
// ************************************************************************************//
// SHA-512 Cryptographic Hash Algorithm
const SITE_LOGIN_SECURE_ALGO = "sha512";
// Your key words
const SITE_LOGIN_SECURE_ALGO_ENCRYPT = "xUCP Free V4";
