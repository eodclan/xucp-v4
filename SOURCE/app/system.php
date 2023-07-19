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
// * Session starting
// ************************************************************************************//
// ob_start function
ob_start();
// session starting
$session_hash = 'sha512';
ini_set('session.use_trans_sid', FALSE);
ini_set('session.entropy_file', '/dev/urandom');
ini_set('session.hash_function', 'whirlpool');
ini_set('session.use_only_cookies', TRUE);
ini_set('session.cookie_httponly', TRUE);
ini_set('session.cookie_lifetime', 1200);
ini_set('session.cookie_secure', TRUE);
$cookieParams = session_get_cookie_params();
session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], true, true);
session_start();
session_regenerate_id(true);

// ************************************************************************************//
// * Config files
// ************************************************************************************//
require_once(dirname(__FILE__) . "/config/config_mysql.php");
require_once(dirname(__FILE__) . "/config/config_settings.php");
require_once(dirname(__FILE__) . "/config/config_class.php");
require_once(dirname(__FILE__) . "/config/config_discord.php");
// ************************************************************************************//
// Themes System
// ************************************************************************************//
include(dirname(__FILE__) . "/../res/themes/default/templates/xucp_header.php");
include(dirname(__FILE__) . "/../res/themes/default/templates/xucp_leftnavi.php");
include(dirname(__FILE__) . "/../res/themes/default/templates/xucp_content.php");
include(dirname(__FILE__) . "/../res/themes/default/templates/xucp_footer.php");
include(dirname(__FILE__) . "/../res/themes/default/templates/xucp_secure.php");
// ************************************************************************************//
// Functions files from this xucp
// ************************************************************************************//
require_once(dirname(__FILE__) . "/features/system/xucp_session.php");
require_once(dirname(__FILE__) . "/features/system/xucp_lang.php");
require_once(dirname(__FILE__) . "/features/system/xucp_avatar.php");
require_once(dirname(__FILE__) . "/features/system/xucp_urls.php");
require_once(dirname(__FILE__) . "/features/system/xucp_site_online.php");
// ************************************************************************************//
// Class files from this xucp
// ************************************************************************************//
require_once(dirname(__FILE__) . "/class/xucp_class_discord.php");
// ************************************************************************************//
// Logout System
// ************************************************************************************//
if(isset($_POST['logout'])){
  xucp_head_no_logged("log-out-circle",LOGOUT);
  setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  session_destroy();
  session_write_close();
  xucp_content_no_logged();
  echo "
				<div class='row row-cols-1 row-cols-lg-2 row-cols-xl-3'>
					<div class='col mx-auto'>
						<div class='card mt-5 mt-lg-0'>
							<div class='card-body'>
								<div class='border p-4 rounded'>
									<div class='text-center'>
										<h3 class=''>".LOGOUT."</h3>
									</div>
									<div class='form-body'>
										<form class='row g-3'>
											<div class='col-12'>
												".MSG_17."
											</div>                                            
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";					
  xucp_foot_no_logged();
  header("refresh:1; /index.php");
  exit();  
}
// ************************************************************************************//
// BB-Code-Editor System
// ************************************************************************************//
/**
 * @param $text
 * @param string $content
 * @return void
 */
function xucp_text_bbcode($text, string $content = ""): void
{
    $button = "/res/themes/default/assets/editor/";

    echo "
            <div class='col-lg-12'>
                <script type='text/javascript' src='/res/themes/default/assets/js/editor.js'></script>
                <script type='text/javascript'>edToolbar('" . $text . "','" . $button . "','true');</script>
                <textarea name='" . $text . "' id='" . $text . "' class='form-control' rows='16' cols='80'>" . $content . "</textarea>
            </div>";
}
// ************************************************************************************//
// Format Comment System for BB-Code-Editor System
// ************************************************************************************//
/**
 * @param $text
 * @param true $strip_html
 * @return array|string
 */
function xucp_bbcode_format($text, $strip_html = true): array|string
{
    $s = stripslashes($text);

    if ($strip_html)
        $s = htmlspecialchars($s);
    // [center]Centered text[/center]
    $s = preg_replace("/\[center]((\s|.)+?)\[\/center]/i", "<div class=\"text-center\">\\1</div>", $s);
    // [list]List[/list]
    $s = preg_replace("/\[list]((\s|.)+?)\[\/list]/", "<ul>\\1</ul>", $s);
    // [list=disc|circle|square]List[/list]
    $s = preg_replace("/\[list=(disc|circle|square)]((\s|.)+?)\[\/list]/", "<ul type=\"\\1\">\\2</ul>", $s);
    // [list=1|a|A|i|I]List[/list]
    $s = preg_replace("/\[list=(1|a|A|i|I)]((\s|.)+?)\[\/list]/", "<ol type=\"\\1\">\\2</ol>", $s);
    // [*]
    $s = preg_replace("/\[\*]/", "<li>", $s);
    // [b]Bold[/b]
    $s = preg_replace("/\[b]((\s|.)+?)\[\/b]/", "<b>\\1</b>", $s);
    // [i]Italic[/i]
    $s = preg_replace("/\[i]((\s|.)+?)\[\/i]/", "<i>\\1</i>", $s);
    // [u]Underline[/u]
    $s = preg_replace("/\[u]((\s|.)+?)\[\/u]/", "<u>\\1</u>", $s);
    // [u]Underline[/u]
    $s = preg_replace("/\[u]((\s|.)+?)\[\/u]/i", "<u>\\1</u>", $s);
    // [color=blue]Text[/color]
    $s = preg_replace("/\[color=([a-zA-Z]+)]((\s|.)+?)\[\/color]/i",
        "<font-color=\\1>\\2</font>", $s);
    // [img]http://www/image.gif[/img]
    $s = preg_replace("/\[img]([^\s'\"<>]+?)\[\/img]/i", "<img src=\"\\1\" alt=\"\">", $s);
    // [img=http://www/image.gif]
    $s = preg_replace("/\[img=([^\s'\"<>]+?)]/i", "<img src=\"\\1\" alt=\"\">", $s);
    // [color=#ffcc99]Text[/color]
    $s = preg_replace("/\[color=(#[a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9])]((\s|.)+?)\[\/color]/i",
        "<font-color=\\1>\\2</font>", $s);
    // [url=http://www.example.com]Text[/url]
    $s = preg_replace("/\[url=([^()<>\s]+?)]((\s|.)+?)\[\/url]/i",
        "<a href=\"\\1\">\\2</a>", $s);
    // [url]http://www.example.com[/url]
    $s = preg_replace("/\[url]([^()<>\s]+?)\[\/url]/i",
        "<a href=\"\\1\">\\1</a>", $s);
    // [size=4]Text[/size]
    $s = preg_replace("/\[size=([1-7])]((\s|.)+?)\[\/size]/i",
        "<font-size=\\1>\\2</font>", $s);
    // [font=Arial]Text[/font]
    $s = preg_replace("/\[font=([a-zA-Z ,]+)]((\s|.)+?)\[\/font]/i",
        "<font-face=\"\\1\">\\2</font>", $s);
    // [quote]Text[/quote]
    $s = preg_replace("/\[quote](.+?)\[\/quote]/is",
        "<div class=\"col-lg-4\"><div class=\"card\"><div class=\"card-header\">".BBCODE_EDITOR."</div><div class=\"card-body\"><div class=\"container py-5 h-100\"><blockquote class=\"card-blockquote mb-0\">\\1</blockquote></div></div></div></div>", $s);
    // [quote=Author]Text[/quote]
    $s = preg_replace("/\[quote=(.+?)](.+?)\[\/quote]/is",
        "<div class=\"col-lg-4\"><div class=\"card\"><div class=\"card-header\">\\".BBCODE_EDITOR_INFO."</div><div class=\"card-body\"><div class=\"container py-5 h-100\"><blockquote class=\"card-blockquote mb-0\">\\2</blockquote></div></div></div></div>", $s);
    // Linebreaks
    $s = nl2br($s);
    // [pre]Preformatted[/pre]
    $s = preg_replace("/\[pre]((\s|.)+?)\[\/pre]/i", "<nobr>\\1</nobr>", $s);
    // Maintain spacing
    return str_replace("  ", " &nbsp;", $s);
}