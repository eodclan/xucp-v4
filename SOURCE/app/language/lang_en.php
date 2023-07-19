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
const DASHBOARD = "Dashboard";
const HOME_NOLOGGED = "Home";
const RULES = "Rules";
const USERACCOUNT = "Account Tools";
const USERPROFILECHANGE = "User Settings";
const USERSUPPORT = "Support";
const WELCOMETO = "Welcome to";
const STAFF_RULESACP = "Rules System";
const SITE_LOGOUT = "Logout";
const NEWS = "News: ";
const SECURE_SYSTEM = "Secure System";
const SITECONFIG_TEAMSPEAK = "Teamspeak Adress";
const GSERVER_INFO_HEAD = "Client & Server";
const GSERVER_INFO_01 = "Here in the list you can see all information about our game servers!";
const GSERVER_INFO_02 = "For further questions please contact the support!";
// ************************************************************************************//
// * My Whitelist Status Language Section - Main 
// ************************************************************************************//
const MYWHITELIST_STATUS = "Your whitelist is approved for our server. We wish you a lot of fun with us!";
const MYWHITELIST_STATUS_2 = "You have not yet created a whitelist or your whitelist may still be in progress! <a href='/vendor/usercp/whitelist/index.php?mywhitelist=addwl'><button class='btn btn-secondary btn-sm waves-effect waves-light'>To the white list</button></a>";
const MYWHITELIST_STATUS_3 = "Your whitelist questionnaire has been sent to our team. Please wait until you are invited to the Teamspeak interview.";
const MYWHITELIST_STATUS_4 = "Unfortunately, your whitelist questionnaire could not be sent to our team. Please contact our support team.";
const MYWHITELIST_STATUS_5 = "Welcome to the whitelist system, please take your time and answer the questions at your own discretion!";
const MYWHITELIST_STATUS_6 = "Remember: You have 20 minutes to send off the questionnaire. After the 5 minutes you have to start over!";
const MYWHITELIST_USERNAME = "Your Username";
const MYWHITELIST_CHARNAME = "Your Character Name";
const MYWHITELIST_STORY = "Your Character Story";
const MYWHITELIST_HEADER = "White list system";
// ************************************************************************************//
// * Whitelist Language Section - Main 
// ************************************************************************************//
const FRAGE1 = "Question 1";
const FRAGE2 = "Question 2";
const FRAGE3 = "Question 3";
const FRAGE4 = "Question 4";
const FRAGE5 = "Question 5";
const FRAGE6 = "Question 6";
const FRAGE7 = "Question 7";
const FRAGE8 = "Question 8";
const FRAGE9 = "Question 9";
const FRAGE10 = "Question 10";
const FRAGE11 = "Question 11";
const FRAGE12 = "Question 12";
const FRAGEDONE = "Your entries were successful!";
const FRAGENOTE = "All questions must be entered!";
const KEYERROR = "That was unsuccessful!";
const FRAGEDONEBTN = "Edit";
const FRAGE_HEADER = "Whitelist Questions";
const FRAGE_HEADER_2 = "Whitelist Applications";
const FRAGE_VIEW = "View Application";
const FRAGE_SEND = "Submit application";
// ************************************************************************************//
// * Keyboard Section - Main 
// ************************************************************************************//
const KEY1 = "Voice Range";
const KEY2 = "LSPD Police Shield (anlegen)";
const KEY3 = "LSPD Police Shield (ablegen)";
const KEY4 = "Auto Farming";
const KEY5 = "Dimension";
const KEY6 = "Tablet";
const KEY7 = "Staatliches Aktensystem";
const KEY8 = "Animationen";
const KEY9 = "Animation Stop";
const KEY10 = "Kleidungsrad";
const KEY11 = "Interagieren";
const KEY12 = "Inventar";
const KEY13 = "Zeigen";
const KEY14 = "Funk";
const KEY15 = "T�ren";
const KEY16 = "Sonstiges";
const KEY17 = "Siren Stummschalten";
const KEY18 = "Handy Hoch";
const KEY19 = "Handy Runter";
const KEYDONE = "Your entries were successful!";
const KEYNOTE = "All questions must be entered!";
const KEYDONEBTN = "Edit";
const KEY_HEADER = "Keyboard Manager";
const KEY_HEADER_2 = "Keyboard";
// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITECONFIG_HEADER = "Site Settings";
const SITECONFIG_HEADERNOTE = "Please note that some settings have to be set with 0 or 1!";
const SITECONFIG_ONLINE = "Site Online Status";
const SITECONFIG_ONLINENOTE = "Our UCP is currently unavailable!";
const SITECONFIG_NAME = "Site Name";
const SITECONFIG_DOWNLOAD_SECTION = "Download Section";
const SITECONFIG_RAGEMP = "Rage.MP";
const SITECONFIG_ALTV = "AltV";
const SITECONFIG_FIVEM = "FiveM";
const SITECONFIG_DONE = "<strong>Success!</strong> The site settings have been saved successfully!";
const SITECONFIG_ERROR = "<strong>Error!</strong> The site settings were not saved successfully!";
const SITECONFIG_REDM = "RedM";
const SITECONFIG_GSERVERNAME = "Game Server Name";
const SITECONFIG_GSERVERIP = "Game Server IP";
const SITECONFIG_GSERVERPORT = "Game Server Port";
const SITECONFIG_THEMES = "Themes";
const SITECONFIG_THEMES_INFO = "Choose the theme you want to use.";
const SITECONFIG_THEMES_BLACK = "Black";
const SITECONFIG_ONLINE_INFO = "Choose the online status you want to use.";
const SITECONFIG_ONLINE_ONLINE = "Online";
const SITECONFIG_ONLINE_OFFLINE = "Offline";
const SITECONFIG_CLIENT_INFO = "Choose the status you want to use.";
const SITECONFIG_CLIENT_YES = "Yes";
const SITECONFIG_CLIENT_NO = "No";
const SITECONFIG_GSERVER_STATUS = "Game Server Status";
const SITECONFIG_LANG = "Site Language";
// ************************************************************************************//
// * English Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "You have no access here!";
const MSG_2 = "You are not a supporter!";
const MSG_7 = "<b>Your changes could not be saved!</b>";
const MSG_8 = "<b>You have successfully edited your account!</b>";
const MSG_9 = "<b>Your registration is complete!</b>";
const MSG_10 = "<b>Please fill in both the username and the password field!</b>";
const MSG_11 = "<b>Wrong password!</b>";
const MSG_12 = "<b>No user found!</b>";
const MSG_13 = "<b>E-Mail is not valid!</b>";
const MSG_14 = "<b>Username is not valid!</b>";
const MSG_15 = "<b>Password must be between 5 and 20 characters long!</b>";
const MSG_16 = "<b>Account already exists</b>";
const MSG_17 = "<b>Your logout was successful!</b>";
const MSG_18 = "<b>Your news entry was not successful!</b>";
const MSG_19 = "<b>Please fill in both the German title and the English title!</b>";
const MSG_20 = "<b>Please fill in both the German content and the English content!</b>";
const MSG_21 = "<b>Your news entry was successful!</b>";
const MSG_22 = "<b>Your rules entry was successful!</b>";
const MSG_23 = "<b>Your rules entry was not successful!</b>";
const MSG_24 = "<b>Your faq entry was successful!</b>";
const MSG_25 = "<b>Your faq entry was not successful!</b>";
const MSG_26 = "<b>Your rank is not unlocked for this page!</b>";
const MSG_27 = "<b>Your login was successful!</b>";
// ************************************************************************************//
// * English Language Section - My Profile Change
// ************************************************************************************//
const WHITELIST = "For the whitelist";
const TWITTER = "For the upcoming Twitter module";
const RPSERVER = "UCP as well as for the game server";
const MYPROFILENOTE = "You have to fill in all fields with every change!";
const SIGNATUR = "Signature";
const SIGNOTE = "Your signature for your profile view!";
const AVATAR = "Avatar url";
const AVANOTE = "Your avatar picture for your profile!";
const MYPROFILESAVE = "Save";
const LANGUAGE = "Website language";
const LANGUAGENOTE = "Here you have the option to change the language of the UCP.";
const CHANGE_MYPROFILE_DASHNOTE = "Please note";
const CHANGE_MYPROFILE_PASSWORD = "Change Password";
const CHANGE_MYPROFILE_SIGNATUR = "Change signature";
const CHANGE_MYPROFILE_USERNAME = "Change username";
const CHANGE_MYPROFILE_EMAIL = "Change E-Mail address";
const CHANGE_MYPROFILE_AVATAR = "Change avatar";
const CHANGE_MYPROFILE_AVATARNOTE = "Drop files here or click to upload.";
const CHANGE_MYPROFILE_LANGUAGE = "Change website language";
const CHANGE_MYPROFILE_LANGUAGENOTE = "Please select";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_EN = "English";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_DE = "German";
const CHANGE_MYPROFILE_BANNED_STATUS = "Yes, you are banned on our game server!!";
// ************************************************************************************//
// * English Language Section - My Profile
// ************************************************************************************//
const PLAYERID = "Player ID";
const PLAYERSOCIALCLUB = "Social Club";
const PLAYEREMAIL = "E-Mail";
const PLAYERBANNED = "Banned";
const PLAYERADMIN = "Admin Level";
const PLAYERWHITELISTED = "Whitelisted";
const PLAYERFIRSTLOGIN = "First Login";
const PLAYERNOTE1 = "From our Project every whitelist is held in our Teamspeak server.";
const PLAYERNOTE2 = "Our statement";
const PLAYERSIGNATURE = "Signature";
const PLAYERABOUTME = "ABOUT ME";
const AVATAR_CHECK_BACK = "Your avatar URL is not allowed!";
const AVATAR_CHECK_OKAY = "Your avatar URL has been allowed!";
// ************************************************************************************//
// * English Language Section - Imprint
// ************************************************************************************//
const IMPRINT_MANAGER_HEADER = "Imprint Manager";
const IMPRINT_HEADER = "Imprint";
const IMPRINT_NAME = "Name";
const IMPRINT_ADDRESS = "Address";
const IMPRINT_PHONE = "Phone number";
const IMPRINT_MANAGER_DONE = "Save";
const IMPRINT_DONE = "Your entry has been successfully saved!";
const IMPRINT_NOT_DONE = "Your entry could not be saved!";
// ************************************************************************************//
// * English Language Section - Team Control
// ************************************************************************************//
const TEAM_CONTROL_HEADER = "Team Control";
const TEAM_CONTROL_SECTION_OPEN = "Open Panel";
const TEAM_CONTROL_SECTION_CATEGORY = "Category";
const TEAM_CONTROL_SUPPORTER_NOTE = "your note message";
const TEAM_CONTROL_SUPPORT_LEADER_NOTE = "your note message";
const TEAM_CONTROL_PROJECT_LEADER_NOTE = "your note message";
// ************************************************************************************//
// * English Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "You have to fill in all fields!";
const NEWS_TITLE_EN = "Title English";
const NEWS_TITLE_EN_TEXT = "The English Title";
const NEWS_TITLE_DE = "Title German";
const NEWS_TITLE_DE_TEXT = "The German Title";
const NEWS_CONTENT_EN = "Content Englisch";
const NEWS_CONTENT_EN_TEXT = "The English Content";
const NEWS_CONTENT_DE = "Content German";
const NEWS_CONTENT_DE_TEXT = "The German Content";
const NEWS_SAVE = "Save";
// ************************************************************************************//
// * English Language Section - Discord Web-Hook Message System
// ************************************************************************************//
const DCWEBHOOK_INFO_LOGIN_1 = "It has just";
const DCWEBHOOK_INFO_LOGIN_2 = "logged into the xUCP!";
const DCWEBHOOK_INFO_REGISTER_1 = "It has just turned";
const DCWEBHOOK_INFO_REGISTER_2 = "registered in xUCP!";
const DCWEBHOOK_INFO_BLOG_ADDED = "A blog post has been created!";
const DCWEBHOOK_INFO_SUPPORT_TICKET_ADDED = "Support Ticket:";
// ************************************************************************************//
// * English Language Section - Teamlist System
// ************************************************************************************//
const TLIST_PROJECT_LEADER = "Project Management";
const TLIST_SUPPORT_LEADER = "Support Leader";
const TLIST_SUPPORTER = "Supporter";
// ************************************************************************************//
// * English Language Section - Rules System
// ************************************************************************************//
const RULES_INFO = "You have to fill in all fields!";
const RULES_TITLE_EN = "Title English";
const RULES_TITLE_EN_TEXT = "The English Title";
const RULES_TITLE_DE = "Title German";
const RULES_TITLE_DE_TEXT = "The German Title";
const RULES_CONTENT_EN = "Content Englisch";
const RULES_CONTENT_EN_TEXT = "The English Content";
const RULES_CONTENT_DE = "Content German";
const RULES_CONTENT_DE_TEXT = "The German Content";
const RULES_SAVE = "Save";
// ************************************************************************************//
// * English Language Section - Support
// ************************************************************************************//
const SUPPORTUSERID = "Player ID";
const SUPPORTINFO = "Your support ticket should be described as precisely as possible.";
const SUPPORTUSERINFO1 = "Enter your username";
const SUPPORTUSERINFO2 = "What bug did you find?";
const SUPPORTUSERINFO3 = "Your description should be described as precisely as possible.";
const SUPPORTUSERNAME = "Username";
const SUPPORTEMAIL = "E-Mail";
const SUPPORTSUBJECT = "Subject";
const SUPPORTMSG = "Message";
const SUPPORTDATE = "Date";
const SUPPORTSAVE = "Save";
const SUPPORTDELETEINFO = "You have deleted all support tickets";
const SUPPORTDELETE1 = "Now go back to the <a href='support.php'>Support Tickets</a>!";
const SUPPORTDELETE2 = "Delete tickets";
const SUPPORTADDTICKET1 = "Now create your ticket!";
const SUPPORTADDTICKET2 = "click me";
const SUPPORTADDDONE = "Your support ticket has been sent!";
const SUPPORT_HEADER_LIST = "Support Tickets";
const SUPPORTOPTIONS = "Options";
const SUPPORTOPTIONS_VIEW = "View";
// ************************************************************************************//
// * English Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Register";
const LOGIN = "Login";
const LOGOUT = "Logout";
const USERNAME = "Username";
const EMAIL = "Email";
const PASSWORD = "Password";
const SUBMIT = "Submit";
const NOTE = "<b>Note:</b> Fields with <span class='pflichtfeld'>*</span> have to be filled out.";
const NOTE2 = "<b>Note:</b> The username and the social club name must be the same.";
const NOTE3 = "<b>Note:</b> Don't have an account ?";
const NOTE4 = "<b>Note:</b> You have an account ?";
const INFO1 = "Enter Username";
const INFO2 = "Enter Password";
const INDEXTEXT = "We bring the roleplay to a new level, with our realistic handling, there are no limits!";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "Discord Tags";
const PROFILE_BANNED = "Game server ban";
const PROFILE_BANNED_YES = "Yes, I'm banned!";
const PROFILE_BANNED_NO = "No, I'm not banned!";
const PROFILE_BANNED_INFO = "You don't need to worry right now!";
const PROFILE_WHITELIST = "Whitelist Status";
// ************************************************************************************//
// * English Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USERCAHNEGED = "Player Changer";
const STAFF_USERCONTROL = "Playerlist";
const STAFF_USERCONTROLUSERID = "Player ID";
const STAFF_USERCONTROLUSERNAME = "Player Username";
const STAFF_USERCONTROLEMAIL = "Player E-Mail";
const STAFF_USERCONTROLACCOUNTWHITELIST = "Player Whitelisted";
const STAFF_USERCONTROLOPTION = "Settings";
const STAFF_USERCONTROLSAVE = "Save";
const STAFF_USERCONTROL_WL_STATUS = "Select the whitelist status.";
const STAFF_CHANGE_USER = "Edit";
const STAFF_BANNED_USER = "Banned";
const STAFF_BANNED_USER_NOTE = "Reason";
// ************************************************************************************//
// * English Language Section - Whitelist System 
// ************************************************************************************//
const WHITELIST_HEADER = "Whitelist Questions";
// ************************************************************************************//
// * English Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Quote";
const BBCODE_EDITOR_INFO = "1 wrote:";