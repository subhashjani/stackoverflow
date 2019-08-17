<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	$qcode=$_GET["code"];	

	
	
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
		
		
		$rs=mysql_query("select * from likeunlikeq where qcode='$qcode' AND email= '$email' AND unlikeq=1")or die(mysql_error());
		
		if($r=mysql_fetch_array($rs)){
		
			mysql_query("update likeunlikeq set unlikeq=0 where qcode='$qcode' AND email='$email'")or die(mysql_error());
		}		

		
		else{
		
			
		$rs=mysql_query("select * from likeunlikeq where qcode='$qcode' AND email= '$email'")or die(mysql_error());

		if($r=mysql_fetch_array($rs)){
			mysql_query("update likeunlikeq set unlikeq=1 where qcode='$qcode' AND email='$email'")or die(mysql_error());
			
			mysql_query("update likeunlikeq set likeq=0 where qcode='$qcode' AND email='$email'")or die(mysql_error());
		}
		
		else{
			
			mysql_query("insert into likeunlikeq values('$qcode','$email',0,'',1)")or die(mysql_error()); 
				header("location:unsave.php?code=$qcode");
		}
			
			//mysql_query("update ans set likeque=likeque + 1 where code='$code'")or die(mysql_error());
		}
	
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
			$qcode=$_GET["code"];
		header("location:ques-ans.php?code=$qcode");
		}
		
		else if(isset($_GET["flag6"])){
		header("location:home.php");
		}
		
	else if(isset($_GET["flag7"])){
		
		$cccode=$_GET["code"];
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