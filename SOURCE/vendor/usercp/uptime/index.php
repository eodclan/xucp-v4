<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.3
// * 
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

xucp_secure();
secure_url();

xucp_head_logged("detail",UPTIME_SYSTEM_HEADER);
xucp_navi_logged();
xucp_content_logged();

$keys_uid = 1;
$select_stmt = $db->prepare("SELECT * FROM xucp_uptime WHERE `id` = ".$keys_uid);
$select_stmt->execute();
$uptime_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
	echo "
                    <div class='row'>
                        <div class='col-xl-6'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_MYSQL." ".UPTIME_STATUS."</h4>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
                                                if (false === fsockopen($db_host, $db_port, $errno, $errstr, 3600)) {
                                                    echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
                                                } else {
                                                    echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
                                                }
												echo "	
													</th>
                                                    <td>".UPTIME_MYSQL."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_HOMEPAGE." ".UPTIME_STATUS."</h4>
                                </div>
                                <div class='card-body'>						
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_homepage'], ENT_QUOTES, 'UTF-8'), 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_HOMEPAGE."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_MAIL." ".UPTIME_STATUS."</h4>
                                </div>
                                <div class='card-body'>										
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_mail'], ENT_QUOTES, 'UTF-8'), 25, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_MAIL."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>									
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_TEAMSPEAK." ".UPTIME_STATUS."</h4>
                                </div>
                                <div class='card-body'>										
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_teamspeak'], ENT_QUOTES, 'UTF-8'), htmlentities($uptime_status['uptime_teamspeak_port'], ENT_QUOTES, 'UTF-8'), $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_TEAMSPEAK."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>									
                                </div>
                            </div>
                        </div>
					</div>
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_SERVICE."</h4>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>
                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_SUPPORT."</th>												
                                                    <th>".UPTIME_WHITELIST."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='table-light'>
                                                    <th scope='row'>".UPTIME_SUPPORT_INFO."</th>
                                                    <td>".UPTIME_WHITELIST_INFO."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".UPTIME_ROCKSTAR."</h4>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>
                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_GTA_ONLINE."</th>
                                                    <th>".UPTIME_SOCIAL_CLUB."</th>
                                                    <th>".UPTIME_LAUNCHER_AUTHENTIFIZIERUNG."</th>
                                                    <th>".UPTIME_CLOUD."</th>													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='table-light'>
                                                    <th scope='row'>";
												if (false === fsockopen("www.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("socialclub.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("www.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("rgl-prod.ros.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>													
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
}
xucp_foot_logged();