
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

	
<a href="profile.php" class="list-group-item list-group-item-action active">admin-penal</a>

<a href="user.php" class="list-group-item list-group-item-action">users</a>
<a href="ques.php" class="list-group-item list-group-item-action">questions</a>
<a href="report.php" class="list-group-item list-group-item-action">reports</a>
</div>
</div>


		  <div class="col-sm-8">
		  <?php
			if(isset($_GET["flag"])){
				echo "!! this category name is available, please choose another name !!";
			}
				
				
				?>
				<div class="panel panel-primary">
					    <div class="panel-heading">add category</div>
						<div class="panel-body">

<form method="post" action="cat.php">
categiry<input type="text"placeholder="enter category" class="form-control"  name="cat"required="required"><br>  
<input type="submit"style="color:blue" value="submit"/>
</form>
</div>
</div>		
	
	<?php
	
	
		}
		

$rs=mysql_query("select * from cat where status=0");
		while($r=mysql_fetch_array($rs)){
			
			
		?>
<table class="table table-responsive">
					<tr><td><?php echo $r[2]; ?></td>
						<form method="post" action="edit.php">
						
 								<input type="hidden" name="code" value="<?php echo $r[1] ; ?>" >
 								<input type="hidden" name="cat" value="<?php echo $r[2] ; ?>" >
		<td><Button>edit</td></Button></form>
				
						<form method="post" action="delete1.php">
						
						 								<input type="hidden" name="cat" value="<?php echo $r[2] ; ?>" >
 								<input type="hidden" name="code" value="<?php echo $r[1] ; ?>" >	
	<td><Button>delete</Button></td></form>
	
						<form method="post" action="block.php">
						 								<input type="hidden" name="cat" value="<?php echo $r[2] ; ?>" >
 								<input type="hidden" name="code" value="<?php echo $r[1] ; ?>" >
	<td><Button>block</Button></td></form></tr>

					</table>
		<?php
		}
		
	
		$rs=mysql_query("select * from cat where status=1");
		while($r=mysql_fetch_array($rs)){
			
			
		?>
<table class="table table-responsive">
					<tr><td><?php echo $r[2]; ?></td>
						<td></td><td></td>
	
						<form method="post" action="unblock.php">
						<input type="hidden" name="cat" value="<?php echo $r[2] ; ?>" >
 								<input type="hidden" name="code" value="<?php echo $r[1] ; ?>" >
	<td><Button >unblock</Button></td></form></tr>

					</table>

		
<?php		
}
}
?>