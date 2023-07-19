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

xucp_secure();
secure_url();
xucp_secure_staff_check_rank();

xucp_head_logged("star",TEAM_CONTROL_HEADER);
xucp_navi_logged();
xucp_content_logged();

echo "
				<div class='row'>
					<div class='col-12'>
						<div class='card'>
							<div class='card-body'>
								<ul class='nav nav-pills mb-3' role='tablist'>
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3 active' data-bs-toggle='tab' href='#supporter' role='tab' aria-selected='true'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-support font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_SUPPORTER."</div>
											</div>
										</a>
									</li>
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3' data-bs-toggle='tab' href='#supportleader' role='tab' aria-selected='false'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-command font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_SUPPORT_LEADER."</div>
											</div>
										</a>
									</li>
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3' data-bs-toggle='tab' href='#projectmanagement' role='tab' aria-selected='false'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-body font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_PROJECT_LEADER."</div>
											</div>
										</a>
									</li>
								</ul>
								<div class='tab-content py-3'>
									<div class='tab-pane fade show active' id='supporter' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card radius-15'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>
									                        <h5 class='mb-0 mt-5'>".$_SESSION['xucp_uname']['secure_uname']."</h5>
									                        <p class='mb-3'>".TEAM_CONTROL_SUPPORTER_NOTE."</p>
									                        <div class='d-grid'>
									                            <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-3'>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-users'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/users/index-control.php' class='bottom-0'>".STAFF_USERCONTROL."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-ticket'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/support/index.php' class='bottom-0'>".SUPPORT_HEADER_LIST."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>					                            
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-wechat'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/whitelist/index-wlquestion.php' class='bottom-0'>".WHITELIST_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-support'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/whitelist/index-wllist.php' class='bottom-0'>".FRAGE_HEADER_2."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>					                            					                            
                                                                </div>
									                        </div>
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																		
									</div>
									<div class='tab-pane fade' id='supportleader' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card radius-15'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>
									                        <h5 class='mb-0 mt-5'>".$_SESSION['xucp_uname']['secure_uname']."</h5>
									                        <p class='mb-3'>".TEAM_CONTROL_SUPPORT_LEADER_NOTE."</p>
									                        <div class='d-grid'>
									                            <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-3'>			                            
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-notepad'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/news/index.php' class='bottom-0'>".NEWS_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-airbnb'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/rules/index.php' class='bottom-0'>".STAFF_RULESACP."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-alarm'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/whitelist/index-wlask.php' class='bottom-0'>".FRAGE_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>					                            					                            					                            
                                                                </div>
									                        </div>
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																			
									</div>
									<div class='tab-pane fade' id='projectmanagement' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card radius-15'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>
									                        <h5 class='mb-0 mt-5'>".$_SESSION['xucp_uname']['secure_uname']."</h5>
									                        <p class='mb-3'>".TEAM_CONTROL_PROJECT_LEADER_NOTE."</p>
									                        <div class='d-grid'>
                                                                <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-3 text-center'>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-protection'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/siteconfig/index.php' class='bottom-0'>".SITECONFIG_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-key'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/keyboard/index.php' class='bottom-0'>".KEY_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>					                            
					                                                <div class='col'>
						                                                <div class='d-flex align-items-center theme-icons shadow-sm p-2 cursor-pointer rounded'>
							                                                <div class='font-24 text-white'>	
								                                                <i class='lni lni-book'></i>
							                                                </div>
							                                                <div class='ms-2'>	
								                                                <span><a href='/vendor/staffcp/imprint/index.php' class='bottom-0'>".IMPRINT_MANAGER_HEADER."</a></span>
							                                                </div>
						                                                </div>
					                                                </div>					                            					                            					                            
                                                                </div>
									                        </div>
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																			
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
xucp_foot_logged();