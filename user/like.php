<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	$qcode=$_GET["code"];	

	
	
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
		
		
		$rs=mysql_query("select * from likeunlikeq where qcode='$qcode' AND email= '$email' AND likeq=1")or die(mysql_error());
		
		if($r=mysql_fetch_array($rs)){
		
			mysql_query("update likeunlikeq set likeq=0 where qcode='$qcode' AND email='$email'")or die(mysql_error());
		}		

		
		else{
		
			
		$rs=mysql_query("select * from likeunlikeq where qcode='$qcode' AND email= '$email'")or die(mysql_error());

		if($r=mysql_fetch_array($rs)){
			mysql_query("update likeunlikeq set likeq=1 where qcode='$qcode' AND email='$email'")or die(mysql_error());
			
			mysql_query("update likeunlikeq set unlikeq=0 where qcode='$qcode' AND email='$email'")or die(mysql_error());
		}
		
		else{
			
			mysql_query("insert into likeunlikeq values('$qcode','$email',0,1,'')")or die(mysql_error()); 
			header("location:save.php?code=$qcode");
		}
			
			//mysql_query("update ans set likeque=likeque + 1 where code='$code'")or die(mysql_error());
		}
		
		if(isset($_GET["flag"])){
		header("location:save.php?flag=1&code=$qcode");
		}
		
		else if(isset($_GET["flag1"])){
		header("location:save.php?flag=1&code=$qcode");
		}
		
		else if(isset($_GET["flag2"])){
		header("location:save.php?flag2=1&code=$qcode");
		}
		
		else if(isset($_GET["flag3"])){
		header("location:save.php?flag3=1&code=$qcode");
		}
		
		else if(isset($_GET["flag4"])){
		header("location:save.php?flag4=1&code=$qcode");
		}
		
		else if(isset($_GET["flag5"])){
			$qcode=$_GET["code"];
		header("location:save.php?qcode=$qcode&flag5=1&code=$qcode");
		}
		
		else if(isset($_GET["flag6"])){
		header("location:save.php?flag6=1&code=$qcode");
		}
		
	else if(isset($_GET["flag7"])){
		
		$cccode=$_GET["code"];
		header("location:save.php?ccode=$cccode&flag7=1&code=$qcode");
		}
		
	else if(isset($_GET["flag8"])){
		$ccode=$_GET["ccode"];
		//header("location:c.php?code=$ccode");
		}
		
	else if(isset($_GET["flag9"])){
		header("location:save.php?flag9=1&code=$qcode");
		}
		
	else if(isset($_GET["flag10"])){
		header("location:save.php?flag10=1&code=$qcode");
		}
		
}
		
		?>