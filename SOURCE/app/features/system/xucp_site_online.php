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
if(intval($_SESSION['xucp_uname']['site_settings_site_online']) >= 1) {
    // Site Online Status = 1 | Online
}else{
    // Site Online Status = 0 | Offline
    xucp_head_no_logged("shield-quarter",SECURE_SYSTEM);
    xucp_content_no_logged();
    echo"
			<div class='container'>
				<div class='card'>
					<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center'>
						<div class='col-xxl-12 text-center'>
							<div class='card-body p-12'>
								<h1 class='display-4'><span class='text-white'>".SECURE_SYSTEM."</span></h1>
								<p>".SITECONFIG_ONLINENOTE."</p>
							</div>
						</div>
					</div>
				</div>
			</div>";
    setCookie("PHPSESSID", "", 0x7fffffff,  "/");
    session_destroy();
    xucp_foot_no_logged();
    die();
}