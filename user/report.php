<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	  
	$qcode=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

$rs=mysql_query("select * from que where code='$qcode' AND status=0");
if($r=mysql_fetch_array($rs)){
	$ques=$r[3];
	
	
mysql_query("insert into report values ('$qcode','$email','$ques')");
}
	header("location:ques-ans.php?code=$qcode");

}
?>