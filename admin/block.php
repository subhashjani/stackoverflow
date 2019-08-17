<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$cat=$_POST["cat"];
		$code=$_POST["code"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		mysql_query("update cat set status=1 where code='$code'");
		
		mysql_query("update catu set status=1 where cat='$cat'");
		
	     header("location:profile.php");
	
}

	?>