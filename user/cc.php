<html>

	<head>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".login").click(function(){
			$("#login").modal();
		});

	});


</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>

</head>
	

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1; height :50px ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	<input type="text" name="ques" placeholder="search here...." style="margin-top : 10px; margin-left: 200px; width:500px">
	<a href="reg.php" style="margin-left : 390px; color:white; text-decoration:none;">Sign Up</a>
	<a href="login.php" style="margin-left : 25px; color:white; text-decoration:none;">login</a>
</div>
</div>
</nav>


<div class="container-fluid">

<div class="row">

<div class="col-sm-12">
<div class="col-sm-2" style="margin-top:50px;">
<div class="sidebar">

	
<a  href="home.php">all questions</a>

<a  href="topque.php">top questions</a>
<a href="view.php">Most viewed questions</a>
<?php

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$zx=mysql_query("select * from cat where status=0");

while($z=mysql_fetch_array($zx)){
?>

<a href="c.php?code=<?php echo $z[1] ; ?>" ><?php echo $z[2] ; ?></a>

<?php
	}
?>
</div>
</div>

      
             <div class="col-sm-7"  style="height:650px; overflow:scroll ">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">question-answer</div>
						<div class="panel-body">
<?php
   
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code' AND status=0");
while($r=mysql_fetch_array($rs)){
		?>
	<div style="width: 694px;
    border: 3px solid gray ;
    padding: 0px;
    margin: 5px;"
>
<?php
$eemail=$r[1];
$vr=mysql_query("select * from user where email='$eemail'");
if($v=mysql_fetch_array($vr)){
?>

		<a href="userprofile1.php?code=<?php echo $v[5] ; ?> " style=" margin-left: 0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a>
<?php
}
?>
		<a  style="color: black; float:right; text-decoration:none">

<?php echo $r[4] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="report.php?code=<?php echo $r[2] ; ?>">report</a></Button><br>

		
<a href="cc.php?code=<?php echo $r[2] ; ?>" style="font-family:bold; font-size:22px;color:black; text-decoration:none"><?php echo $r[3] ; ?></a>   <br>
<a style="font-family:bold; font-size:20px;color:black; text-decoration:none">description:-<?php echo $r[10] ; ?></a>  
<div class="row" style="height:28px ;  margin: 2px; background-color:#e8e9ea; opacity:0.9">

<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<a href="like.php?code=<?php echo $r[2] ; ?>&flag7=1"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>&flag7=1"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 250px"></i>
	<?php
echo $r[7];
?>


<a href="cc.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 230px"></i></a>


<?php
echo $r[8];

?>
</div>
</div><br>
		<form method="post" action="show.php">
		
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
		answer<textarea placeholder="write answer" class="form-control" name="ans"></textarea>
         <button class="btn btn-warning" style=" width:100px"><a style="color:black; text-decoration:none">post</a></button></form>
	<?php

		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=0");
	while($a=mysql_fetch_array($ab)){
		?>
	<div style="width: 694px;
    border: 2px solid gray ;
    padding: 0px;
    margin: 5px;"
>

<?php
$eeemail=$a[5];
$bn=mysql_query("select * from user where email='$eeemail'");
if($b=mysql_fetch_array($bn)){
?>

		<a href="userprofile1.php?code=<?php echo $b[5] ; ?> " style=" margin-left: 0px; text-decoration:none">

<?php echo $a[7] ; ?>  </a>
<?php
}
?>


		<a  style="color: black; float:right; text-decoration:none">

<?php echo $a[3] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="report.php?code=<?php echo $r[2] ; ?>">report</a></Button><br>


<a   style="font-family:bold; font-size:20px;color:black; text-decoration:none">
 
<?php echo $a[2] ; ?>  </a>
<?php	
$code=$a[1];
	$gh=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND likea=1");
	$jk=mysql_num_rows($gh);
	?>
		<a href="likea.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>&flag7=1" style=" margin-left:530px " class="glyphicon glyphicon-thumbs-up"></a>
	
		<?php
echo $jk;
?>
	<?php	
$code=$a[1];
	$gh=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND unlikea=1");
	$jk=mysql_num_rows($gh);
	?>
		<a href="unlikea.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>&flag7=1" style=" margin-left:25px " class="glyphicon glyphicon-thumbs-down"></a>
		
		<?php
echo $jk;
?>
</div>
<?php
	}
		
	
	
	
}			
?>
</div></div>

<label style="float:right; font-family:bold; font-size:20px;"><a>1</a><a>2</a><a>3</a><a>4</a><a>......</a><a>more</a></label>
</div>

 <div class="col-sm-3" style="margin-top:100px">
 
		<div class="container-fluid">
				<div class="carousel slide" id="carousel" data-ride="carousel">
					     
						<div class="carousel-inner">
				
								<div class="item active">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND likeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
								<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
					<?php
	}
?>		
								</div>
								
								<div class="item">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND comment > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
																<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	
										
								</div>
								<div class="item">
		<?php
						
	$ps=mysql_query("select * from que where status=0 AND unlikeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>													
													<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	
										
								</div>
								
								<div class="item">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND likeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
																<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	

								</div>
								
							
						</div>
				</div>

		</div>
		
		<div class="container-fluid">
				<div class="carousel slide" id="carousel" data-ride="carousel">
					     
						<div class="carousel-inner">
				
								<div class="item active">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND comment > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
								<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
					<?php
	}
?>		
								</div>
								
								<div class="item">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND unlikeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
																<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	
										
								</div>
								<div class="item">
		<?php
						
	$ps=mysql_query("select * from que where status=0 AND likeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>													
													<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	
										
								</div>
								
								<div class="item">
										<?php
						
	$ps=mysql_query("select * from que where status=0 AND unlikeque > 1");
	while($p=mysql_fetch_array($ps)){
            ?>
																<a href="cc.php?code=<?php echo $p[2] ; ?>" style="font-family:bold; font-size:18px;color:black"><?php echo $p[3] ; ?></a><br>
				<?php
	}
?>	

								</div>
								
							
						</div>
				</div>

		</div>
		</div>

</div></div></div>
<div class="container-fluid">
  
<div class="row" style="height:150px ; background-color:#e8e9ea; opacity:0.9">

<div class="col-sm-12">


<div class="col-sm-4">

<div style="margin-top:20px; color:white"><a style=" color:black">privacy</a></div>
<div style="margin-top:20px; color:white"><a  style=" color:black">about us</a></div>
<div style="margin-top:20px; color:white"><a style=" color:black">content us</a></div>
</div>
<div class="col-sm-4">

<div style="margin-top:10px;">
<img src="stack.png" style="width: 230px; height: 130px;" class="img-responsive "></div>
</div>

<div class="col-sm-4">

<div style="margin-top:50px; float:right" >
<a href="https://twitter.com/Subhash_Jani29?lang=en" style="color: black"><img src="twitter.png" style="width: 50px; height: 40px;" class="img-responsive img-circle"></a></div>

<div style="margin-top:50px; float:right">
<a href="https://twitter.com/Subhash_Jani29?lang=en" style="color: black"><img src="linked.png" style="width: 50px; height: 40px; " class="img-responsive img-circle"></a></div>

<div style="margin-top:50px; float:right">
<a href="https://www.instagram.com/j__a__n__i_/?hl=en" style="color: black"><img src="insta1.png" style="width: 50px; height: 40px; " class="img-responsive img-circle"></a></div>
</div>

 </div>
</div>
  
<div class="row" style="height:50px ; background-color:black; opacity:0.9">
<div style=" margin-top:15px; margin-left:470px">
<a style="color: white; text-decoration:none"> Passionately created by:</a><a href="https://twitter.com/Subhash_Jani29">Jani </a><span style="color: white">  & </span> <a href="https://www.skillhoard.com/"> skillhoard </a>

 </div>

 </div>

</div>

</body>
</html>