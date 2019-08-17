<?php
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$codeee=$_GET["codeee"];
	$date=date("d m, y");
	$reciver=$_GET["reciver"];
	$email=$_COOKIE["user"];
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

		$sn=0;
		$rs=mysql_query("select max(sn) from shareq");
		if($r=mysql_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
		 $a=mysql_query("insert into shareq values($sn,'$email','$reciver','$codeee','$date',0)");
		if(is_null($a)){
			header("location:allque.php");
		}
		else{
			header("location:allque.php");
		} 
}
?>