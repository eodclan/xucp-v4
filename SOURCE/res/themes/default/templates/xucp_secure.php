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
function xucp_secure(): void
{
	if(!isset($_SESSION['xucp_uname']['secure_first']) || $_SESSION['xucp_uname']['secure_granted'] !== 'granted' || $_SESSION['xucp_uname']['site_settings_site_online'] !== '1') {
		xucp_head_no_logged("shield-quarter",SECURE_SYSTEM);
		xucp_content_no_logged();
		echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".SECURE_SYSTEM."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".MSG_1."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
		xucp_foot_no_logged();
		die();
	}  
}

/**
 * @return void
 */
function xucp_secure_staff_check(): void
{
	if(intval($_SESSION['xucp_uname']['secure_staff']) < UC_CLASS_SUPPORTER) {
		xucp_head_no_logged("shield-quarter",SECURE_SYSTEM);
		xucp_content_no_logged();
		echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".SECURE_SYSTEM."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".MSG_2."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
		xucp_foot_no_logged();
		die();		
	}
}

/**
 * @return void
 */
function xucp_secure_supleader_check(): void
{
    if(intval($_SESSION['xucp_uname']['secure_staff']) < UC_CLASS_SUPPORTER_LEADER) {
		xucp_head_no_logged("shield-quarter",SECURE_SYSTEM);
		xucp_content_no_logged();
		echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".SECURE_SYSTEM."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".MSG_2."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
		xucp_foot_no_logged();
        die();
    }
}

/**
 * @return void
 */
function xucp_secure_staff_check_rank(): void
{
	if(intval($_SESSION['xucp_uname']['secure_staff']) < UC_CLASS_PROJECT_MANAGEMENT) {
		xucp_head_no_logged("shield-quarter",SECURE_SYSTEM);
		xucp_content_no_logged();
		echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".SECURE_SYSTEM."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".MSG_26."
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
		xucp_foot_no_logged();
		die();		
	}
}