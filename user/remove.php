<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	
		$code=$_GET["code"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
		mysql_query("update shareq set status=1 where codeee='$code'")or die(mysql_error());
		echo $code;
	     header("location:share2.php");
	
}

	?>