<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
		$code=$_POST["code"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		//mysql_query("update cat set status=1 where code='$code'");
		
		mysql_query("update ans set status=0 where code='$code'");
		
	     header("location:ques.php");
	
}

	?>