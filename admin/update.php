<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	
		$code=$_POST["code"];
		$cat=$_POST["cat"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
	$rs=mysql_query("select * from cat where cat='$cat'");
if($r=mysql_fetch_array($rs)){
	header("location:profile.php");
}
else{
		mysql_query("update cat set cat='$cat' where code='$code'");
		
		mysql_query("update catu set cat='$cat'");
	     header("location:profile.php");
	}
}

	?>