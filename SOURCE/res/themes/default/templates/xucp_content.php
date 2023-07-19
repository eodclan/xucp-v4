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
function xucp_content_no_logged(): void
{
  echo "
		<div class='authentication-forgot d-flex align-items-center justify-content-center'>
			<div class='container-fluid'>";	  
}

/**
 * @return void
 */
function xucp_content_logged(): void
{
  echo "
		<div class='page-wrapper'>
			<div class='page-content'>";	
}