<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
 $email=$_COOKIE["user"];
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
		mysql_query("insert into saveque values ('$email','$code',0)")or die(mysql_error());
	if(isset($_GET["flag"])){
		header("location:profile.php");
		}
		
		else if(isset($_GET["flag1"])){
		header("location:topq.php");
		}
		
		else if(isset($_GET["flag2"])){
		header("location:intque.php");
		}
		
		else if(isset($_GET["flag3"])){
		header("location:allque.php");
		}
		
		else if(isset($_GET["flag4"])){
		header("location:intque.php");
		}
		
		else if(isset($_GET["flag5"])){
			$qcode=$_GET["qcode"];
		header("location:ques-ans.php?code=$qcode");
		}
		
		else if(isset($_GET["flag6"])){
		header("location:home.php");
		}
		
	else if(isset($_GET["flag7"])){
		
		$cccode=$_GET["ccode"];
		header("location:cc.php?code=$cccode");
		}
		
	else if(isset($_GET["flag8"])){
		$ccode=$_GET["ccode"];
		//header("location:c.php?code=$ccode");
		}
		
	else if(isset($_GET["flag9"])){
		header("location:topque.php");
		}
		
	else if(isset($_GET["flag10"])){
		header("location:view.php");
		}
		
}
?>