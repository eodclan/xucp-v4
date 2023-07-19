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
secure_url();
xucp_head_no_logged("shape-circle","404");
xucp_content_no_logged();
echo "
		<div class='error-404 d-flex align-items-center justify-content-center'>
			<div class='container'>
				<div class='card mt-5'>
					<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-6 justify-content-center'>
						<div class='col-12 col-lg-12 mx-auto'>
							<div class='card-body p-4'>
								<h1 class='display-1'><span class='text-white'>4</span><span class='text-white'>0</span><span class='text-white'>4</span></h1>
								<p>The page you requested could not be found.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";			
xucp_foot_no_logged();
