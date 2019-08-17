
<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];


	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from admin where email='$email'");

	if($r=mysql_fetch_array($rs)){
	
	?>
<html>

	<head>
	


		<link rel="stylesheet" href="bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.8">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="profile.php">admin-penal</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="logout.php" style="color:white" > logout</a></li>
	
	</ul>
	</div>
	
</nav>



<div class="container-fluid">

<div class="row">
<div class="col-sm-3">					    

<div class="sidebar">

	
<a href="profile.php" class="list-group-item list-group-item-action ">admin-penal</a>

<a href="user.php" class="list-group-item list-group-item-action">users</a>
<a href="ques.php" class="list-group-item list-group-item-action">questions</a>
<a href="report.php" class="list-group-item list-group-item-action active">reports</a>
</div>
</div>


		  <div class="col-sm-8">
		  <?php
		  mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$gh=mysql_query("select * from report")or die(mysql_error());
		

		while($g=mysql_fetch_array($gh)){
			?>
			
			<a href="que-ans2.php?code=<?php echo $g[0] ; ?>"><?php echo $g[2] ; ?></a><br>
			sender:--<a style="color:black; text-decoration:none"><?php echo $g[1] ; ?></a><br>
			
	<Button><a href="blockque.php?code=<?php echo $g[0] ; ?>" style="text-decoration:none">block</a></Button><br><br>
		<?php
		
		
		
		}
		$ad=mysql_query("select * from reporta")or die(mysql_error());
		

		while($a=mysql_fetch_array($ad)){
			?>
			
			<a href="que-ans2.php?code=<?php echo $a[3] ; ?>&flag=1"><?php echo $a[2] ; ?></a><br>
			sender:--<a style="color:black; text-decoration:none"><?php echo $a[1] ; ?></a><br>
			
	<Button><a href="blockans.php?code=<?php echo $a[0] ; ?>" style="text-decoration:none">block</a></Button><br><br>
		<?php
		
		
		
		}
	}
}
?>