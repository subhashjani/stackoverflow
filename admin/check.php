<?php
if(empty($_POST["email"])||empty($_POST["password"])){
	 header("location:login.php?err=1");
 }
 else{
	 $email=$_POST["email"];
	 $password=$_POST["password"];
	 mysql_connect("localhost","root","");
	 mysql_select_db("overflow");
	 $rs=mysql_query("select * from admin where email='$email'");
	 if($r=mysql_fetch_array($rs)){
		 if($r["password"]==$password){
			 
		 setcookie("user",$email,time()+3600);
			  header("location:profile.php");
		 
		 }
	 
	 else{
		 header("location:login.php?mismatch=1");
	 }
	 }
	 
	 else{
		 header("location:login.php?invalid=1");
	 }
 }
 
 ?>

