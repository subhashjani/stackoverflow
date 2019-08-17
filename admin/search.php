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

</head>
	

<body>

<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.8">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="stgflow.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="user.php" style="color:white" > user</a></li>
	<li><a href="logout.php" style="color:white" > logout</a></li>
	
	</ul>
	</div>
	
</nav>



<div class="container-fluid">
<div style="width:600px ; margin-left:500px">
<form method="post" action="search.php">

category<input type="text" name="cat" required="required" placeholder="enter category" class="form-control">

            <input type="submit" value="Search" class="btn btn-default" style="background-color:#333 ; color:white ; border:none" />  

</form>
	</div>


<div class="row">

<div class="col-sm-3">					    

	<div   class="panel panel-primary">
	
<div class="panel-heading">Daskboard</div>

<div class="list-group panel-body" style="height: 540px">
<a href="profile.php" class="list-group-item list-group-item-action">admin-penal</a>

<a href="user.php" class="list-group-item list-group-item-action">user</a>
<a href="profile.php" class="list-group-item list-group-item-action">ex</a>

</div>
</div>
</div>

<?php
	}
?>
<?php


if(empty($_POST["cat"])){
	header("location:user.php");

}
else{


		$cat=$_POST["cat"];
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from user where cat='$cat' AND status=0");
while($r=mysql_fetch_array($rs)){
	?>
	
	<div class="col-sm-8">
	
	
	<img src="<?php echo "stageoverflow/user/upload/".$r[4].".jpg"; ?>" style="width: 30px; height: 30px" class="img-responsive img-circle">

<table class="table table-responsive">

					<tr><td><?php echo $r[1]; ?></td>
					
						<form method="post" action="userprofile.php">
						
 								<input type="hidden" name="email" value="<?php echo $r[4] ; ?>" >
 								
		<td><Button>view-profile</td></Button></form></tr>
					<tr><td><?php echo $r[4]; ?></td>
					
				
	
						<form method="post" action="block1.php">
						
 								<input type="hidden" name="email" value="<?php echo $r[4] ; ?>" >
	<td><Button>block</Button></td></form></tr>

					</table>
				<?php
		}
		
	
		$rs=mysql_query("select * from user where cat='$cat' AND status=1");
		while($r=mysql_fetch_array($rs)){
			
			
		?>	
		
	<img src="<?php echo "stageoverflow/user/upload/".$r[4].".jpg"; ?>" style="width: 30px; height: 30px" class="img-responsive img-circle">

<table class="table table-responsive">

					<tr><td><?php echo $r[1]; ?></td>
					
						<form method="post" action="userprofile.php">
						
 								<input type="hidden" name="email" value="<?php echo $r[4] ; ?>" >
 								
		<td><Button>view-profile</td></Button></form></tr>
					<tr><td><?php echo $r[4]; ?></td>
					
				
	
						<form method="post" action="unblock1.php">
						
 								<input type="hidden" name="email" value="<?php echo $r[4] ; ?>" >
	<td><Button>unblock</Button></td></form></tr>

					</table>

<?php
		}
}
}
?>
</div>

</div>
</div>

</body>
</html>

</body>