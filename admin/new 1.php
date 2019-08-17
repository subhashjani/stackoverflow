
<div class="col-sm-4">


		<div class="container-fluid">
				<div class="carousel slide" id="carousel" data-ride="carousel">
					    <ol class="carousel-indicators">
					    	<li  data-target="#carousel" data-slide-to="0" class="active"></li>
					    	<li  data-target="#carousel" data-slide-to="1"></li>
							<li  data-target="#carousel" data-slide-to="2"></li>
					   
					    </ol>
						<div class="carousel-inner">
								<div class="item active">
										<img src="http://127.0.0.1/matrimonial/z.jpg" style="width:200px; height:200px" class="img-responsive">
								</div>
								<div class="item">
										<img src="http://127.0.0.1/matrimonial/x.jpg" style="width:200px; height:200px" class="img-responsive">
								</div>
								
								<div class="item">
										<img src="http://127.0.0.1/matrimonial/c.jpg" style="width:200px; height:200px"class="img-responsive">
								</div>
								
								
						</div>
				</div>

		</div><br>
		
		
</div>




$email=$_POST["email"];
		mysql_connect("localhost","root","");
		mysql_select_db("matrimonialdb");
		$rs=mysql_query("select * from matri where email='$email'");
	 if($r=mysql_fetch_array($rs)){
		 header("location:home.php?invelid");
	 }



<div class="col-sm-4">

		<div class="container-fluid">
				<div class="carousel slide" id="carousel" data-ride="carousel">
					    <ol class="carousel-indicators">
					    	<li  data-target="#carousel" data-slide-to="0" class="active"></li>
					    	<li  data-target="#carousel" data-slide-to="1"></li>
							<li  data-target="#carousel" data-slide-to="2"></li>
					   
					    </ol>
						<div class="carousel-inner">
								<div class="item active">
										<img src="http://127.0.0.1/matrimonial/pic1.jpg" class="img-responsive">
								</div>
								<div class="item">
										<img src="http://127.0.0.1/matrimonial/pic2.jpg" class="img-responsive">
								</div>
								
								<div class="item">
										<img src="http://127.0.0.1/matrimonial/e.jpg" class="img-responsive">
								</div>
								
								
						</div>
				</div>

		</div>
</div>









		
		
		<?php
if(!isset($_COOKIE["user"])){
	header("location:home.php");
}
else{
	$email=$_COOKIE["user"];
			mysql_connect("localhost","root","");
		mysql_select_db("matrimonialdb");
		$rs=mysql_query("select * from reg where email='$email'");
		if($r=mysql_fetch_array($rs)){
			
	?>
	
	
	
	
	
	<?php
		}
}
?>




upload/'<?php echo $email; ?>.'



!!!!imp!!!!!
		
if(isset($_GET["code"])){	

$code=$_GET["code"];
		
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from cat where code='$code'");
	if($r=mysql_fetch_array($rs)){
		
} 
		
}




?code=$code

!!!!!!!





<form method="post" action="ques-ans.php">

 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
<tr><td><input type="submit" value="<?php echo $r[3] ; ?>" ></td></tr></table></form>			











		$cat=$_POST["cat"];
		
		$rs=mysql_query("select code from cat where cat=$cat");
		if($r=mysql_fetch_array($rs)){
			
			
			
			
			
			
			
			
			
							<h4>category</h4>
<?php


	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from cat where status=0");

	while($r=mysql_fetch_array($rs)){

?>
<input type="checkbox" name="cat" value="<?php echo $r[2]; ?>"><?php echo $r[2]; ?><br><br>
<?php
	}
?>






						<form method="post" action="show.php">
						
ans<textarea placeholder="enter answer" class="form-control" name="ans"  required="required"></textarea><br>
                                          
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
 							<button class="btn btn-warning"><a style="color:black" >answer</a></button></form><br><br>
							
							
		<?php //9214314857//


<?php
if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	
			mysql_connect("localhost","root","");
		mysql_select_db("overflow");
	
		$code=$_POST["code"];
		

		
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from cat where code='$code'");
	if($r=mysql_fetch_array($rs)){

			
	?>
			
			<form method="post" action="update.php">
			
 								<input type="hidden" name="code" value="<?php echo $r[1] ; ?>" >
<br><input type="text" class="form-control" name="cat" value=<?php echo $r[2];?>>
				
		<Button>save</Button></form>
					
		<?php
		
}
}
?>




<?php

if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	$code=$_REQUEST["code"];
	
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$like=0;
		$rs=mysql_query("select like from que where code='$code'")or die(mysql_error());
		if($r=mysql_fetch_array($rs)){
			$like=$r[0];
		}
		$like++;
		
		mysql_query("update que set like=$like where code='$code'")or die(mysql_error());
		header("location:profile.php");
}
?>






		$xy=mysql_query("select * from unlikeque");
		
		while($x=mysql_fetch_array($xy)){
		if($x[1]=$v_p){
		
			mysql_query("update que set unlikeque=unlikeque - 1 where code='$code'");	
			
		mysql_query("delete from unlikeque where $code_liker='$v_p'");
		}
		}













<?php
if(empty($_POST["name"])){
	header("location:user.php");

}
else{
		$name=$_POST["name"];
			mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$rs=mysql_query("select * from user where name='$name'");
		while($r=mysql_fetch_array($rs)){
			
	?>
	
	
	
		

<img src="<?php echo "upload/".$r[3].".jpg"; ?>" style="width: 30px; height: 30px; margin-left:85px" class="img-responsive img-circle">
		<table class="table table-responsive">
					<tr><td>Name</td><td><?php echo $r[1]; ?></td></tr>
					<tr><td>phone number</td><td><?php echo $r[2]; ?></td></tr>
					<tr><td>email</td><td><?php echo $r[3]; ?></td></tr>
		</table>
		<a href="fullprofile.php?email=<?php echo $r[3]; ?>" class="btn btn-warning">view Profile</a><br><br>
		<?php
		}
		
		
		
}
?>

<?php


	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from cat where status=0");

	while($r=mysql_fetch_array($rs)){

?>

					<h4>category</h4><input type="checkbox" name="cat"value="cat"><?php echo $r[2]; ?></tr>
<?php
	}
?>




<h4>category</h4><input type="checkbox" name="cat"value="cat">c<input type="checkbox"name="cat" value="java">java<input type="checkbox"name="cat" value="php">php<br> <br>









<td><?php echo $r[0]; ?></td><br><br>


select cotegory<select name="cat" class="form-control" required="required"><br>
<option value="c">c</option>
<option value="php">php</option>
<option value="java">java</option>









<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$liker=$_COOKIE["user"];
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
		$v_p=$code."_".$liker;
		
		$rs=mysql_query("select * from likeque")or die(mysql_error());
		$count=0;
		$sn=0;
		$ab=mysql_query("select max(sn) from likeque")or die(mysql_error());

		if($aba=mysql_fetch_array($ab)){
			$sn=$aba[0];
		}
		$sn++;
		
		while($r=mysql_fetch_array($rs)){
			if($r[1]!=$v_p){
				$count++;
			}
		}

		if($sn==$count+1){
			mysql_query("insert into likeque values($sn,'$v_p')"); 
			
			//mysql_query("update ans set likeque=likeque + 1 where code='$code'");

			mysql_query("update que set likeque=likeque + 1 where code='$code'");
		}
}
		
		?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code'");
while($r=mysql_fetch_array($rs)){
	
		echo " <br> from : ".$r[1]. "<br> question: ".$r[3]."<br> date : ".$r[4]. "<br> <br>";

		
		?>
		<a href="like.php?code=<?php echo $r[2] ; ?>" style=" margin-left:4px "><button>like</button></a>
		<form method="post" action="show.php">
		
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
		ans<textarea placeholder="enter answer" class="form-control" name="ans" required="required"></textarea><br>
         <button class="btn btn-warning"><a style="color:black">answer</a></button></form><br><br>
	<?php

		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee'");
	while($a=mysql_fetch_array($ab)){
		echo " <br> from : ".$a[5]. "<br> answer : ".$a[2]."<br> date : ".$a[3]. "<br> <br>";
		?>
	
		<a href="unlikeque.php?code=<?php echo $r[2] ; ?>" style=" margin-left:4px "><button>unlike</button></a>
		<a href="like.php?code=<?php echo $r[2] ; ?>" style=" margin-left:4px "><button>like</button></a>
	<?php
	}
		
	$reader=$_COOKIE["user"];
			$code=$r[2];
		$v_p=$code."_".$reader;
		$rs=mysql_query("select * from queview");
		$count=0;
		$sn=0;
		$ab=mysql_query("select max(sn) from queview");

		if($aba=mysql_fetch_array($ab)){
			$sn=$aba[0];
		}
		$sn++;
		
		while($r=mysql_fetch_array($rs)){
			if($r[1]!=$v_p){
				$count++;
			}
		}

		if($sn==$count+1){
			mysql_query("insert into queview values($sn,'$v_p')");
			mysql_query("update que set view=view + 1 where code='$code'");
		}
}
	
	}
			
?>
















<?php
   
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code' AND status=0");
while($r=mysql_fetch_array($rs)){
	
		echo " <br> from : ".$r[1]. "<br> question: ".$r[3]."<br> date : ".$r[4]. "<br> <br>";

		
		?>
		<a href="login.php?" style=" margin-left:4px "><button>like</button></a>
		<form method="post" action="login.php">
		
		ans<textarea placeholder="enter answer" class="form-control" name="ans" required="required"></textarea><br>
         <button class="btn btn-warning"><a style="color:black">answer</a></button></form><br><br>
	<?php

		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=0");
	while($a=mysql_fetch_array($ab)){
		echo " <br> from : ".$a[5]. "<br> answer : ".$a[2]."<br> date : ".$a[3]. "<br> <br>";
	}
		
		}
		
?>
















echo " <br> from : ".$r[1]. "<br> question : ".$r[3]."<br> question description : ".$r[10]."<br> date : ".$r[4]. "<br> <br>";
		
		
		?>
		<a href="like.php?code=<?php echo $r[2] ; ?>" style=" margin-left:4px "><button>like</button></a>
		<form method="post" action="show.php">
		
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
		ans<textarea placeholder="enter answer" class="form-control" name="ans" required="required"></textarea><br>
         <button class="btn btn-warning"><a style="color:black">answer</a></button></form><br><br>
	<?php
		
		$codee=$r[2];
		
$ab=mysql_query("select * from ans where codee='$codee'");
	while($a=mysql_fetch_array($ab)){
		echo " <br> from : ".$a[5]. "<br> answer : ".$a[2]."<br> date : ".$a[3]. "<br> <br>";
		
			
	}
