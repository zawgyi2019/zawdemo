<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php 
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {
	date_default_timezone_set('Asia/Tokyo');
}


$site_top = "http://127.0.0.1/Peacock/";


$to = "myozawoo350@gmail.com";


$from = "myozawoo350@gmail.com";


$Email = "Email";


$Referer_check = 0;


$Referer_check_domain = "http://127.0.0.1/Peacock/";



$useToken = 0;


$userMail = 1;


$BccMail = "";


$subject = "Peacock Contact";


$confirmDsp = 0;


$jumpPage = 1;


$thanksPage = "success.php";


$requireCheck = 0;


$require = array('Name','Email');


$remail = 1;


$refrom_name = "";


$re_subject = "Automatic reply ｜ Thank you for sending";



$dsp_name = 'Name';


$remail_text = <<< TEXT

Thank you for contacting us. Please wait for a while as we will reply to you as soon as possible after confirming the contents. Thank you for your cooperation.

TEXT;



$mailFooterDsp = 1;


$mailSignature = <<< FOOTER

---------  Peacork Food Delivery Institude  ----------
Zaw Gyi（Creator）
No. 233-B, Second Floor, Insein Road, Hlaing Township. Yangon.
Tel: 09694380024 FAX: 01-9667336
E-mail： peacook2020@gmail.com URL： http://www.peacork.com.mm
--------------------------------------------------

FOOTER;

$mail_check = 1;

$hankaku = 0;


$hankaku_array = array('Phone Number','Amount');


$use_envelope = 0;


$replaceStr['before'] = array('①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩','№','㈲','㈱','髙');

$replaceStr['after'] = array('(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','No.','（有）','（株）','高');

//------------------------------- Optional settings up to here ---------------------------------------------


// Only knowledgeable people are responsible for the following changes.

//----------------------------------------------------------------------
//  Function execution, variable initialization
//----------------------------------------------------------------------
//Session start for token check
if($useToken == 1 && $confirmDsp == 1){
	session_name('PHPMAILFORMSYSTEM');
	session_start();
}
$encode = "UTF-8";
if(isset($_GET)) $_GET = sanitize($_GET);
if(isset($_POST)) $_POST = sanitize($_POST);
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);
if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);

//Variable initialization
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//Email address check
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">【".$key."】,The email address format is incorrect.</p>\n";
				$empty_flag = 1;
			}
		}
	}
}

if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){

	//Token check (CSRF measures) * Conducted only when the confirmation screen is ON
	if($useToken == 1 && $confirmDsp == 1){
		if(empty($_SESSION['mailform_token']) || ($_SESSION['mailform_token'] !== $_POST['mailform_token'])){
			exit('Illegal page transition');
		}
		if(isset($_SESSION['mailform_token'])) unset($_SESSION['mailform_token']);
		if(isset($_POST['mailform_token'])) unset($_POST['mailform_token']);
	}

	//Set the email that reaches the sender
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$from,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//Set the email that arrives to the administrator
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";

	//Envelope From (Return-Path) setting with -f option (implemented only when safe_mode is OFF and the above setting is ON)
	if($use_envelope == 0){
		mail($to,$subject,$adminBody,$header);
		if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader);
	}else{
		mail($to,$subject,$adminBody,$header,'-f'.$from);
		if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader,'-f'.$from);
	}
}
else if($confirmDsp == 1){

/*　▼▼▼Layout of transmission confirmation screen * Editable Original design can also be applied▼▼▼　*/
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="format-detection" content="telephone=no">
<title>Confirmation Screen</title>
<style type="text/css">
#formWrap {
	width:700px;
	margin:0 auto;
	color:#555;
	line-height:120%;
	font-size:90%;
}
table.formTable{
	width:100%;
	margin:0 auto;
	border-collapse:collapse;
}
table.formTable td,table.formTable th{
	border:1px solid #ccc;
	padding:10px;
}
table.formTable th{
	width:30%;
	font-weight:normal;
	background:#efefef;
	text-align:left;
}
p.error_messe{
	margin:5px 0;
	color:red;
}
/*　Simplified responsive CSS (only the minimum required. Please set freely including breakpoints)　*/
@media screen and (max-width:572px) {
#formWrap {
	width:95%;
	margin:0 auto;
}
table.formTable th, table.formTable td {
	width:auto;
	display:block;
}
table.formTable th {
	margin-top:5px;
	border-bottom:0;
}
input[type="submit"], input[type="reset"], input[type="button"] {
	display:block;
	width:100%;
	height:40px;
}
}
</style>
</head>
<body>

<!-- ▲ Header and other contents * Can be edited freely ▲-->

<!-- ▼************ Transmission content display section * Editing is at your own risk ************ ▼-->
<div id="formWrap">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h4>There is an error in the input. Please check the following and click the "Back" button to make corrections.</h4>
<?php echo $errm; ?><br /><br /><input type="button" value="Return" onClick="history.back()">
</div>
<?php }else{ ?>
<h3>Confirmation Screen</h3>
<p align="center">If there are no mistakes in the following contents, click the "Send" button.</p>
<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
<table class="formTable">
<?php echo confirmOutput($_POST);?>
</table>
<p align="center"><input type="hidden" name="mail_set" value="confirm_submit">
<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
<input type="submit" value="　Send　">
<input type="button" value="Return" onClick="history.back()"></p>
</form>
<?php } ?>
</div><!-- /formWrap -->
<!-- ▲ *********** Transmission content confirmation department * Editing is at your own risk ************ ▲-->

<!-- ▼ Footer Other contents, etc. * Editable ▼-->
</body>
</html>
<?php
/* ▲▲▲Layout of transmission confirmation screen * Original design can also be applied▲▲▲　*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) {

/* ▼▼▼Sōshin kanryō gamen no reiauto henshū-ka※ sōshin kanryō-go ni shitei no pēji ni idō shinai baai nomi hyōji
42 / 5000
Translation results
The layout of the transmission completion screen can be edited. * Displayed only when the specified page is not moved after transmission is completed.▼▼▼　*/

?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="format-detection" content="telephone=no">
<title>Finished Screen</title>
</head>
<body>
<div align="center">
<?php if($empty_flag == 1){ ?>
<h4>There is an error in the input. Please check the following and click the "Back" button to make corrections.</h4>
<div style="color:red"><?php echo $errm; ?></div>
<br /><br /><input type="button" value=" Return " onClick="history.back()">
</div>
</body>
</html>
<?php }else{ ?>
Thank you for sending.<br />
The transmission was completed successfully.<br /><br />
<a href="<?php echo $site_top ;?>">To Top Page&raquo;</a>
</div>
<?php copyright(); ?>
<!--  When measuring the CV rate, paste the Analytics code here -->
</body>
</html>
<?php
/* ▲▲▲The layout of the transmission completion screen can be edited. * Displayed only when the specified page is not moved after transmission is completed.▲▲▲　*/
  }
}
//Display when there is no confirmation screen, in the case of setting to move to the specified page, redirect to the specified page if there is no problem in the error check
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) {
	if($empty_flag == 1){ ?>
<div align="center"><h4>There is an error in the input. Please check the following and click the "Back" button to make corrections.</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" value=" Return " onClick="history.back()"></div>
<?php
	}else{ header("Location: ".$thanksPage); }
}

// Only knowledgeable people are requested to make the following changes at their own risk.

//----------------------------------------------------------------------
//  START
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-zA-Z]+(\.[!#%&\-_0-9a-zA-Z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
//Replacement function for erroneous conversion characters in Shift-JIS
function sjisReplace($arr,$encode){
	foreach($arr as $key => $val){
		$key = str_replace('＼','ー',$key);
		$resArray[$key] = $val;
	}
	return $resArray;
}
//Function to set POST data in outgoing mail
function postToMail($arr){
	global $hankaku,$hankaku_array;
	$resArray = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){
				//Processing of concatenated items
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');

		}else{ $out = $val; }//Check box (array) postscript up to here
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }

		//Full-width → half-width conversion
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "【 ".h($key)." 】 ".h($out)."\n";
		}
	}
	return $resArray;
}
//Function for outputting the input contents of the confirmation screen
function confirmOutput($arr){
	global $hankaku,$hankaku_array,$useToken,$confirmDsp,$replaceStr;
	$html = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){
				//Processing of concatenated items
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');

		}else{ $out = $val; }//Check box (array) postscript up to here
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		$out = nl2br(h($out));//※追記 改行コードを<br>タグに変換
		$key = h($key);
		$out = str_replace($replaceStr['before'], $replaceStr['after'], $out);//Machine-dependent character replacement

		//Full-width → half-width conversion
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}

		$html .= "<tr><th>".$key."</th><td>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
		$html .= "</td></tr>\n";
	}
	//Set token
	if($useToken == 1 && $confirmDsp == 1){
		$token = sha1(uniqid(mt_rand(), true));
		$_SESSION['mailform_token'] = $token;
		$html .= '<input type="hidden" name="mailform_token" value="'.$token.'" />';
	}

	return $html;
}

//Full-width → half-width conversion
function zenkaku2hankaku($key,$out,$hankaku_array){
	global $encode;
	if(is_array($hankaku_array) && function_exists('mb_convert_kana')){
		foreach($hankaku_array as $hankaku_array_val){
			if($key == $hankaku_array_val){
				$out = mb_convert_kana($out,'a',$encode);
			}
		}
	}
	return $out;
}
//Processing of array concatenation
function connect2val($arr){
	$out = '';
	foreach($arr as $key => $val){
		if($key === 0 || $val == ''){
			$key = '';
		}elseif(strpos($key,"円") !== false && $val != '' && preg_match("/^[0-9]+$/",$val)){
			$val = number_format($val);
		}
		$out .= $val . $key;
	}
	return $out;
}

//Email header sent to administrator
function adminHeader($userMail,$post_mail,$BccMail,$to){
	$header = '';
	if($userMail == 1 && !empty($post_mail)) {
		$header="From: $post_mail\n";
		if($BccMail != '') {
		  $header.="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$post_mail."\n";
	}else {
		if($BccMail != '') {
		  $header="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$to."\n";
	}
		$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
		return $header;
}
//Email body sent to the administrator
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp){
	$adminBody="「".$subject."」I received an email from\n\n";
	$adminBody .="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$adminBody.= postToMail($arr);//POST Data function from set.
	$adminBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$adminBody.="Date and time sent：".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="Sender's IP address：".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="Sender's host name：".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	if($confirmDsp != 1){
		$adminBody.="Contact page URL：".@$_SERVER['HTTP_REFERER']."\n";
	}else{
		$adminBody.="Contact page URL：".@$arr['httpReferer']."\n";
	}
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	return mb_convert_encoding($adminBody,"JIS",$encode);
}

//User-address email header
function userHeader($refrom_name,$to,$encode){
	$reheader = "From: ";
	if(!empty($refrom_name)){
		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != $encode){
			mb_internal_encoding($encode);
		}
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//Outgoing mail body to user
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " 様\n";
	$userBody.= $remail_text;
//	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
//	$userBody.= postToMail($arr);//POST data is function from set.
//	$userBody.="\n＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
//	$userBody.="送信日時：".date( "Y/m/d (D) H:i:s", time() )."\n";
	if($mailFooterDsp == 1) $userBody.= $mailSignature;
	return mb_convert_encoding($userBody,"JIS",$encode);
}
//Mandatory check function
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal) {

				//Mandatory check for concatenated item (array)
				if(is_array($val)){
					$connectEmpty = 0;
					foreach($val as $kk => $vv){
						if(is_array($vv)){
							foreach($vv as $kk02 => $vv02){
								if($vv02 == ''){
									$connectEmpty++;
								}
							}
						}

					}
					if($connectEmpty > 0){
						$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】 is a required field.</p>\n";
						$res['empty_flag'] = 1;
					}
				}
				//Default required check
				elseif($val == ''){
					$res['errm'] .= "<p class=\"error_messe\">【".h($key)."】 is a required field.</p>\n";
					$res['empty_flag'] = 1;
				}

				$existsFalg = 1;
				break;
			}

		}
		if($existsFalg != 1){
				$res['errm'] .= "<p class=\"error_messe\">【".$requireVal."】 is not selected.</p>\n";
				$res['empty_flag'] = 1;
		}
	}

	return $res;
}
//Referrer check
function refererCheck($Referer_check,$Referer_check_domain){
	if($Referer_check == 1 && !empty($Referer_check_domain)){
		if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
			return exit('<p align="center"> Eeferrer check error. The domain of the form page does not match the domain of this file.</p>');
		}
	}
}
function copyright(){
	echo '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank">- PHP Workshop -</a>';
}
//----------------------------------------------------------------------
//  Function definition(END)
//----------------------------------------------------------------------
?>
