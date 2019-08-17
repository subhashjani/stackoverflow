<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	if(empty($_POST["cat"])||empty($_POST["ques"])||empty($_POST["quesd"])){
	 header("location:profile.php?err=1");
 }
 else{
	 
	$email=$_COOKIE["user"];
		$code=$_POST["code"];
		$ques=$_POST["ques"];
		
		$quesd=$_POST["quesd"];
		$cat=$_POST["cat"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
				$rs=mysql_query("select * from que where code='$code' AND comment=0")or die(mysql_error());
if($r=mysql_fetch_array($rs)){
				mysql_query("update que set ques='$ques' where code='$code'")or die(mysql_error());
				mysql_query("update que set quesd='$quesd' where code='$code'")or die(mysql_error());
		for($i=0 ; $i<sizeof($cat); $i++){ 
			
				mysql_query("update qcat set cat='$cat[$i]' where code='$code'");
				
			header("profile.php?flag=1");
		/*	$ac=mysql_query("select * from cat where cat='$cat[$i]'");
		while($c=mysql_fetch_array($ac)){
			$code=$c[1];
		
		mysql_query("insert into catu values ('$cat[$i]','$email',0,'$code')")or die(mysql_error());*/
		}
		}
		else{
			header("location:edit.php?flag=1");
		}
		
			header("location:profile.php");	
		}	
 }
 ?>