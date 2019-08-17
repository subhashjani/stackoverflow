

<?php

if(!isset($_COOKIE["user"])){
		header("location:login.php?erroor=1");
	}
	else{
	
	$date=date("d m, y");
	

		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		//$rs=mysql_query("select * from ans where ans='$ans'");
		
		
	$a=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',1,2,3,4,5,6,7,8,9,0);
$b=array_rand($a,5);
$code="";
for($i=0; $i<sizeof($b); $i++){
	$code=$code.$a[$b[$i]];
	

	}
	
		$sn=0;
		$rs=mysql_query("select max(sn) from ans");
		if($r=mysql_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
	
	
	
	$code=$code."_".$sn; 
		
		
		//mysql_connect("localhost","root","");
		//mysql_select_db("overflow");
		
		
	$code=$_POST["code"];
	
		$ans=$_POST["ans"];
	$froms=$_COOKIE["user"];
	$comment=0;
		$pq=mysql_query("select * from que where code='$code'");
		if($p=mysql_fetch_array($pq)){
			$comment=$p[8];
		}
		$comment++; 
		echo $comment.$p[2];
		
	$codee=$_POST["code"];
		mysql_query("update que set comment=$comment where code='$code'");
		
		//mysql_query("update que set comment=comment + 1 where code='$code'");
		$ab=mysql_query("select * from user where email='$froms'");
				if($a=mysql_fetch_array($ab)){
					$name=$a[1];
		
		$r=mysql_query("insert into ans values($sn,'$code','$ans','$date','','$froms','$codee','$name')");
		
		header("location:ques-ans.php?code=$codee");
//mysql_query("update ans set ans='$ans'  where email='$email'")or die(mysql_error());

//mysql_query("update ans set froms='$froms'  where email='$email'")or die(mysql_error());
		//mysql_query("insert into ans values('','','','$ans','',,'','$froms')"));
		//header("location:profile.php");AND froms='$froms'
 }
	}
		
	
		
		?>