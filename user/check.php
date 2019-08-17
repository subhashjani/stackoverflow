<?php
if(empty($_POST["name"])||empty($_POST["cat"])||empty($_POST["pn"])||empty($_POST["email"])||empty($_POST["password"])){
	 header("location:reg.php?err=1");
 }
 else{
	   
	$email=$_POST["email"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$rs=mysql_query("select * from user where email='$email'");
	 if($r=mysql_fetch_array($rs)){
		 header("location:reg.php?invelid");
	 }
		
		else{	
		
$a=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',1,2,3,4,5,6,7,8,9,0);
$b=array_rand($a,5);
$code="";
for($i=0; $i<sizeof($b); $i++){
	$code=$code.$a[$b[$i]];
	

}
	
		$sn=0;
		$rs=mysql_query("select max(sn) from user");
		if($r=mysql_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
	
	
	
	$code=$code."_".$sn;                                                                         

			
			
	
			
		$name=$_POST["name"];
		$pn=$_POST["pn"];
		$email=$_POST["email"];
		
		$cat=$_POST["cat"];
		
			
			
		
		$password=$_POST["password"];
		
		$img=$email.".jpg";  
$target = "upload/";  
$target = $target . $img; 
		$size=($_FILES['photo']['size']);
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
 { 
echo "Image Upload";
} 
else 
{ 
	echo "Sorry, there was a problem uploading your file.";
} 

		
		
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
		mysql_query("insert into user values ($sn,'$name','$pn','$email','$password','$code',0,0)")or die(mysql_error());
		
		for($i=0 ; $i<sizeof($cat); $i++){
			
			
		$ac=mysql_query("select * from cat where cat='$cat[$i]'");
		while($c=mysql_fetch_array($ac)){
			$code=$c[1];
		
		mysql_query("insert into catu values ('$cat[$i]','$email',0,'$code')")or die(mysql_error());
	    setcookie("user",$email,time()+3600);
		
	 
		header("location:login.php");
		}
		}
		}
	}
?>


