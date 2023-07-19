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
// * Modal: Signup
// ************************************************************************************//
echo "
		<div class='modal fade' id='registerModal' tabindex='-1' aria-labelledby='registerModalLabel' aria-hidden='true'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h5 class='modal-title' id='registerModalLabel'>".REGISTER."</h5>
						<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body'>
						<div class='text-center'>
							<p>".NOTE."</p>
						</div>
						<div class='form-body'>
							<form class='row g-3' novalidate action='/app/features/user/xucp_signup.php' method='post' enctype='multipart/form-data' autocomplete='off'>
								<div class='col-sm-6'>
									<label for='inputFirstName' class='form-label'>".EMAIL." *</label>
									<input type='email' name='xucp_email' class='form-control' id='inputFirstName' placeholder='".EMAIL."'>
								</div>
								<div class='col-sm-6'>
									<label for='inputLastName' class='form-label'>".USERNAME." *</label>
									<input type='text' name='xucp_username' class='form-control' id='inputLastName' placeholder='".INFO1."'>
								</div>
								<div class='col-12'>
									<label for='inputChoosePassword' class='form-label'>".PASSWORD."</label>
									<div class='input-group' id='show_hide_password'>
										<input type='password' name='xucp_password' class='form-control border-end-0' id='inputChoosePassword' placeholder='".INFO2."'> <a href='javascript:;' class='input-group-text'><i class='bx bx-hide'></i></a>
									</div>
								</div>
								<div class='col-12'>
									<div class='d-grid'>
										<button type='submit' name='xucp_signup' class='btn btn-light'><i class='bx bx-user'></i>".REGISTER."</button>
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