<html>

	<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="bootstrap.min.css">

		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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



<div class="container-fluid"  class="row" style="background-image:url(http://127.0.0.1/stage%20overflow/user/am1.jpg) ; height:500px; margin-top:50px">
<div class="col-sm-12">
<div class="col-sm-8">
<label style="font-family:Comic Sans MS; font-size:30px;color:black; margin-top:440px">One of the most popular problem solving website</label>

</div>
<div class="col-sm-4">

    <label style="background-color:#333 ; opacity:0.8 ;  margin-right:50px ; width:400px ;border:2;  float:right; margin-top:60px">
    <h4 style="color: white; margin-left:150px">registration</h4>
	
	
	
<form method="post" action="check.php">
<label style="color:white">name</label><input type="text"placeholder="enter name" class="form-control" name="name"required="required"> 

<br>  
<label style="color:white">category</label>
<input type="checkbox" name="cat[]" value="php"><label style="color:white">php</label>

<input type="checkbox" name="cat[]" value="java"><label style="color:white">java</label>

<input type="checkbox" name="cat[]" value="c"><label style="color:white">c</label><br>

	
<label style="color:white">phone number</label><input type="text" placeholder="enter phone number"name="pn" class="form-control" required="required">
<label style="color:white">Email</label><input type="Email"placeholder="enter email" class="form-control" name="email"required="required">
<label style="color:white">password</label><input type="password"placeholder="password" class="form-control"  name="password"required="required"><br> 

<input type="submit"style="color:blue" value="registration"/>

</form>

	
			</label>
</div>

</div>
</div>




<div class="container-fluid" >

<div class="row">

<div class="col-sm-12" >
<div class="col-sm-2" >

<div class="sidebar">

	
<a class="active" href="home.php">All questions</a>

<a href="topque.php">Top questions</a>
<a href="view.php">Most viewed questions</a>
<br>
<select id="cat-choose" class="form-control">
	<option>select question category</option>
  <?php

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$zx=mysql_query("select * from cat where status=0");

while($z=mysql_fetch_array($zx)){
?>
<option  href="c.php?cat=<?php echo $z[2] ; ?>">
<a href="c.php?cat=<?php echo $z[2] ; ?>" ><?php echo $z[2] ; ?></a></option>

<?php
	}
?>
</select>
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

<div class="col-sm-7 " style="overflow:scroll; height:635px">

<?php
mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from que where status=0");
	while($r=mysql_fetch_array($rs)){
            ?>
			

<table class="table table-responsive">
<tr>
<td 
>
<div>

<a href="cc.php?code=<?php echo $r[2] ; ?>" style="font-family:bold; font-size:22px;color:black; text-decoration:none;"><?php echo $r[3] ; ?></a>
 </div> 
</td>
</tr>
</table>
 
 
<?php
$qcode=$r[2];
	
	$ab=mysql_query("select * from qcat where qcode='$qcode'");
	while($a=mysql_fetch_array($ab)){

?>
<div class="badge">
<a href="c.php?code=<?php echo $a[2] ; ?>" style="color:white"><?php echo $a[1]; ?></a>
</div>
<?php
	}	
	
?>
 
  <div class="row" style="height:28px ;  margin: 2px; background-color:#d9d9d9 ">
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
	
?>

<div class="container-fluid">
  
<div class="row">
<div class="col-sm-12">
<div class="col-sm-4">
	<a href="like.php?code=<?php echo $r[2] ; ?>&flag6=1"><li class="glyphicon glyphicon-thumbs-up" style=" color:#595959"></li></a>
 	
	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>&flag6=1"><li class="glyphicon glyphicon-thumbs-down" style=" color:#595959"></li></a>
 	
	<?php
echo $xy;
	
?>
</div>
<div class="col-sm-4">
<li class="glyphicon glyphicon-eye-open" style=" color:#595959"></li>

	<?php
echo $r[7];
?>
</div>
<div class="col-sm-4">
<a href="cc.php?code=<?php echo $r[2] ; ?>"><li class="glyphicon glyphicon-comment" style="color:#595959"></li></a>

	<?php
echo $r[8];
?>
</div>
</div>
</div></div>
</div>
  

			<?php
	
	}
		
	
		
?>

<label style="float:right; font-family:bold; font-size:20px;"><a>1</a><a>2</a><a>3</a><a>4</a><a>......</a><a>more</a></label>
</div>
 <div class="col-sm-3" style="margin-top:100px; height:535px">
 
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
 
</div>
  </div>
  </div>
  
<div class="jumbotron text-center">
  <h1>stgflow</h1> 
  <p>Get amazing questions on your email</p> 
  <form class="form-inline">
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
  
  
</div>
<div class="container-fluid">
  
<div class="row" style="height:150px ; background-color:#f1f1f1; opacity:1">

<div class="col-sm-12">


<div class="col-sm-4">

<div style="margin-top:20px; color:white"><a style=" color:black">privacy</a></div>
<div style="margin-top:20px; color:white"><a  style=" color:black">about us</a></div>
<div style="margin-top:20px; color:white"><a style=" color:black">content us</a></div>
</div>
<div class="col-sm-4">

<div style="margin-top:10px;">
<label><img src="stack.png" style="width: 230px; height: 130px;" class="img-responsive "></label></div>
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
<a style="color: white; text-decoration:none;"> Passionately created by:</a><a href="https://twitter.com/Subhash_Jani29">Jani </a><span style="color: white">  & </span> <a href="https://www.skillhoard.com/"> skillhoard </a>

 </div>

 </div>

</div>
  

<body>
</html>
