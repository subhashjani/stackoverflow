<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
		$code=$_GET["code"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		//mysql_query("update cat set status=1 where code='$code'");
		
		mysql_query("update que set status=0 where code='$code'");
		
	     header("location:ques.php");
	
}

	?>