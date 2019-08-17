<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	$acode=$_GET["code"];	

	
	
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
		
		
		$rs=mysql_query("select * from likeunlikea where acode='$acode' AND email= '$email' AND unlikea=1")or die(mysql_error());
		
		if($r=mysql_fetch_array($rs)){
		
			mysql_query("update likeunlikea set unlikea=0 where acode='$acode' AND email='$email'")or die(mysql_error());
		}		

		
		else{
		
			
		$rs=mysql_query("select * from likeunlikea where acode='$acode' AND email= '$email'")or die(mysql_error());

		if($r=mysql_fetch_array($rs)){
			mysql_query("update likeunlikea set unlikea=1 where acode='$acode' AND email='$email'")or die(mysql_error());
			
			mysql_query("update likeunlikea set likea=0 where acode='$acode' AND email='$email'")or die(mysql_error());
		}
		
		else{
			
			mysql_query("insert into likeunlikea values('$acode','$email',0,'',1)")or die(mysql_error()); 
		}
			
			//mysql_query("update ans set likeque=likeque + 1 where code='$code'")or die(mysql_error());
		}
	
		if(isset($_GET["flag5"])){
			$qcode=$_GET["codee"];
		header("location:ques-ans.php?code=$qcode");
		}
		
	else if(isset($_GET["flag7"])){
		
		$cccode=$_GET["codee"];
		header("location:cc.php?code=$cccode");
		}
		
	//	header("location:profile.php");	
	
}
		
		?>