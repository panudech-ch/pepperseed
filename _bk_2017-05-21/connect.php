<?
	$host = "127.0.0.1";
	$us = 'pepperse_EsPe3e2';
	$pw = 'F22v5#5n3zjhlfDG5n3Opm5';
	$dbname = 'pepperse_P3pe123';
	
	$c = mysql_connect($host, $us, $pw);
mysql_query("set NAMES utf8");
	if(!$c){
		echo "<h3>ERROR: Can't connect with database</h3>";
		exit();
	}
	mysql_select_db("$dbname",$c);
	
	error_reporting(0);
	
?>