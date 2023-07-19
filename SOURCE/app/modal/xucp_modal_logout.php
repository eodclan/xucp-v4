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
// * Direct Call Blocker
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /vendor/webcp/404/index.php' ) );
}
// ************************************************************************************//
// * Modal: Logout
// ************************************************************************************//
echo "
		<div class='modal fade' id='logoutModal' tabindex='-1' aria-labelledby='logoutModalLabel' aria-hidden='true'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h5 class='modal-title' id='logoutModalLabel'>".SITE_LOGOUT."</h5>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<div class='form-body'>
							<form class='row g-3' novalidate action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
								<div class='col-12'>
									<div class='d-grid' id='logout'>
										<button type='submit' name='logout' class='btn btn-light px-5'>
											<i class='lni lni-shift-right'></i>&nbsp;".SITE_LOGOUT."
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
						<div class='modal-footer'>
							<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>";