<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
		$code=$_REQUEST["code"];
	echo $code;
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$rs=mysql_query("select * from ans where code='$code'")or die(mysql_error());
		if($r=mysql_fetch_array($rs)){
			$email=$r[5];
			
		mysql_query("update user set cont=cont + 1 where email='$email'")or die(mysql_error());
		
		$rs=mysql_query("select * from user where email='$email' AND cont < 4")or die(mysql_error());
		if($r=mysql_fetch_array($rs)){
		
			header("location:blocku.php?email=$email");
		}
		
		
		
		mysql_query("update ans set status=1 where code='$code'");
	     header("location:user.php");
		}
}

	?>