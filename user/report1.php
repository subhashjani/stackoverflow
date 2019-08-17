<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$qcode=$_GET["qcode"];
	$email=$_COOKIE["user"];
	  
	$acode=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

$rs=mysql_query("select * from ans where code='$acode' AND status=0");
if($r=mysql_fetch_array($rs)){
	$ans=$r[2];
	
	
mysql_query("insert into reporta values ('$acode','$email','$ans','$qcode')");
}
	header("location:ques-ans.php?code=$qcode");

}
?>