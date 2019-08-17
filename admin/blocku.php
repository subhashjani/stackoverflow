<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
		$email=$_GET["email"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		mysql_query("update user set status=1 where email='$email'");
		
		
	     header("location:user.php");
	
}

	?>