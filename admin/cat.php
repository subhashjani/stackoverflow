<?php
if(empty($_POST["cat"])){
	 header("location:profile.php?err=1");
 }
		else{
		$cat=$_POST["cat"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");

$a=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',1,2,3,4,5,6,7,8,9,0);
$b=array_rand($a,5);
$code="";
for($i=0; $i<sizeof($b); $i++){
	$code=$code.$a[$b[$i]];
	

	}
	
		$sn=0;
		$rs=mysql_query("select max(sn) from cat");
		if($r=mysql_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
	
	
	
	$code=$code."_".$sn;                                                                         
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
	$rs=mysql_query("select * from cat where cat='$cat'");
			if($r=mysql_fetch_array($rs)){
				header("location:profile.php?flag=1");
			}
		else{
		mysql_query("insert into cat values ($sn,'$code','$cat',0) ")or die(mysql_error());
		
		header("location:profile.php?");
		}
		}
?>




