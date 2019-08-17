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


<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1; height :50px ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	<input type="text" name="ques" placeholder="search here...." style="margin-top : 10px; margin-left: 200px; width:500px">
	<a href="logout.php" style="margin-left : 450px; color:white; text-decoration:none;">logout</a>
</div>
</div>
</nav>


<div class="container-fluid"  style="margin-top:60px">
<div class="row">
<div class="col-sm-3">					    

<div class="sidebar">

	
<a href="user.php" class="list-group-item list-group-item-action active">users</a>
<a href="profile.php" class="list-group-item list-group-item-action ">admin-penal</a>

<a href="ques.php" class="list-group-item list-group-item-action">questions</a>

<a href="report.php" class="list-group-item list-group-item-action ">reports</a>
</div>
</div>

<?php
	}
?>
<?php



	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from user where status=0");
while($r=mysql_fetch_array($rs)){
	?>
	
	<div class="col-sm-8">
	
	
	

<table class="table table-responsive">

					<tr><td><?php echo $r[1]; ?></td>
					
 								
		<td><Button><a href="userprofile.php?code=<?php echo $r[5] ; ?>" style="text-decoration:none">view-profile</a></td></Button></tr>
					<tr><td><?php echo $r[3]; ?></td>
					
				
	
	<td><Button><a href="block1.php?code=<?php echo $r[5] ; ?>" style="text-decoration:none">block</a></Button></td></tr>

					</table>
				<?php
		}
		
	
		$rs=mysql_query("select * from user where status=1");
		while($r=mysql_fetch_array($rs)){
			
			
		?>	
		

<table class="table table-responsive">

					<tr><td><?php echo $r[1]; ?></td>
					
 								
		<td><Button><a href="userprofile.php?code=<?php echo $r[5] ; ?>" style="text-decoration:none">view-profile</a></td></Button></tr>
					<tr><td><?php echo $r[3]; ?></td>
					
				
	
	<td><Button><a href="unblock1.php?code=<?php echo $r[5] ; ?>" style="text-decoration:none">unblock</a></Button></td></tr>
					
					</table>

<?php
}
}
?>
</div>

</div>

</div>
</body>
</html>

</body>