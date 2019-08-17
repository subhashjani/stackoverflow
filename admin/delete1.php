<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
		$code=$_POST["code"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		mysql_query("delete from cat where code='$code'");
	     header("location:profile.php");
	}

	?>
