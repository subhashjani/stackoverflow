<html>

	<head>
		<link rel="stylesheet" href="bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


     </head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1; height :50px ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	</div>
<ul class="nav navbar-nav navbar-right">

	<li><a href="home.php" style="color:white" > home</a></li>
	<li><a href="reg.php" style="color:white" > sign-up</a></li>
	
	
	</ul>
</div>
</nav>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

<div class="col-sm-4">
</div>
		  <div class="col-sm-4"  style="margin-top:70px">
			
				<div class="panel panel-primary">
					    <div class="panel-heading">login</div>
						<div class="panel-body">	
	
<form method="post" action="check1.php">
Email<input type="Email"placeholder="enter email" class="form-control" name="email"required="required"><br>
password<input type="password"placeholder="enter password" class="form-control"  name="password"required="required"><br>  
<input type="submit"style="color:blue" value="sign-in"/>

</form>
</div></div>
<a href="#">forget password?</a> <a href="reg.php" style="margin-left:150px">create new Account</a>
<?php
			if(isset($_GET["flag"])){
				echo "!! your are blocked by admin, please contect to admin !!";
			}
				
				
				?>
</div>
</div></div>
</div>
<div class="container-fluid">
  
<div class="row" style="height:150px ; background-color:#e8e9ea; margin-top:100px; opacity:0.9">

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

</body>
</html>