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
function xucp_foot_logged(): void
{
            // ************************************************************************************//
            // Modal System
            // ************************************************************************************//
            include(dirname(__FILE__) . "/../../../../app/modal/xucp_modal_logout.php");
            echo "
			</div>
		</div>
		<div class='overlay toggle-icon'></div>
		<a href='javaScript:;' class='back-to-top'><i class='bx bxs-up-arrow-alt'></i></a>
	</div>
	<script src='/res/themes/default/assets/js/bootstrap.bundle.min.js'></script>
	<script src='/res/themes/default/assets/js/jquery.min.js'></script>
	<script src='/res/themes/default/assets/plugins/simplebar/js/simplebar.min.js'></script>
	<script src='/res/themes/default/assets/plugins/metismenu/js/metisMenu.min.js'></script>
	<script src='/res/themes/default/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js'></script>
	<script src='/res/themes/default/assets/plugins/apexcharts-bundle/js/apexcharts.min.js'></script>
	<script src='/res/themes/default/assets/plugins/datatable/js/jquery.dataTables.min.js'></script>
	<script src='/res/themes/default/assets/plugins/datatable/js/dataTables.bootstrap5.min.js'></script>
	<script>
		$(document).ready(function() {
			$('#Transaction-History').DataTable({
				lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
			});
		  } );
	</script>
	<script src='/res/themes/default/assets/js/index.js'></script>
	<script src='/res/themes/default/assets/js/app.js'></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
</body>
</html>";   
}

/**
 * @return void
 */
function xucp_foot_no_logged(): void
{
            // ************************************************************************************//
            // Modal System
            // ************************************************************************************//
            include(dirname(__FILE__) . "/../../../../app/modal/xucp_modal_signin.php");
            include(dirname(__FILE__) . "/../../../../app/modal/xucp_modal_signup.php");
            echo "
			</div>
		</div>
		<footer class='text-white bg-no-logged rounded rounded-0 shadow-sm fixed-bottom'>
			<p class='text-center'>&copy; DerStr1k3r.de. All rights reserved.</p>
		</footer>
	</div>
	<script src='/res/themes/default/assets/js/bootstrap.bundle.min.js'></script>
	<script src='/res/themes/default/assets/js/jquery.min.js'></script>

	<script>
		$(document).ready(function () {
			$('#show_hide_password a').on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr('type') == 'text') {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass('bx-hide');
					$('#show_hide_password i').removeClass('bx-show');
				} else if ($('#show_hide_password input').attr('type') == 'password') {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass('bx-hide');
					$('#show_hide_password i').addClass('bx-show');
				}
			});
		});
	</script>
</body>
</html>";   
}