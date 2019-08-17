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
	<a  class="navbar-brand" href="home" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="#">user-profile</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="user.php" style="color:white" > users</a></li>
	
	<li><a href="profile.php" style="color:white" > admin-penal</a></li>
	
	</ul>
	</div>
	
</nav>


<?php
if(!isset($_COOKIE["user"])){
		header("location:login.php?erroor=1");
	}
	else{
		$code=$_REQUEST["code"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$rs=mysql_query("select * from user where code='$code'")or die(mysql_error());
		

		if($r=mysql_fetch_array($rs)){
			$email=$r[3];
		
			?>
<div class="col-sm-12">
<div class="col-sm-3">
<div class="sidebar">

	<?php
	
			
	?>
<a href="#" class="list-group-item list-group-item-action active">user profile</a>
<a href="userans.php?email=<?php echo $r[3] ; ?>" class="list-group-item list-group-item-action">user answers</a>
<a href="userque.php?email=<?php echo $r[3] ; ?>" class="list-group-item list-group-item-action ">user questions</a>

</div>
</div>




<div class="col-sm-8">
<table class="table table-responsive">
					<tr><td>Name</td><td><?php echo $r[1]; ?></td></tr>
					
					<tr><td>phone number</td><td><?php echo $r[2]; ?></td></tr>
					<tr><td>email</td><td><?php echo $r[3]; ?></td></tr>
					<tr><td>category</td>
					<?php
					
		$pq=mysql_query("select * from catu where email='$email'")or die(mysql_error());
		

		while($p=mysql_fetch_array($pq)){
		?>
					<td><?php echo $p[0]; ?></td>
			<?php
		}
					?>
					</tr>
					</table>
						
<div class="row" style="height:50px ; background-color: white; opacity:1">
<?php

	$yu=mysql_query("select * from que where email='$email' AND status=0");
	$xy=mysql_num_rows($yu);
?>

<label>total questions:-<?php echo $xy; ?></label><br>
<label>total life line:-
<?php

	$yu=mysql_query("select * from user where email='$email' AND status=0 AND cont=0");
if($y=mysql_fetch_array($yu)){
	echo "100%";
}
	$yu=mysql_query("select * from user where email='$email' AND status=0 AND cont=1");
if($y=mysql_fetch_array($yu)){
	echo "66.66%";
}
	$yu=mysql_query("select * from user where email='$email' AND status=0 AND cont=2");
if($y=mysql_fetch_array($yu)){
	echo "33.33%";
}
	
?>
</label>
</div>

<?php

$sd=mysql_query("select * from user where status=0 AND email='$email'");
if($s=mysql_fetch_array($sd)){
	?>
	
	
	
	
	

<table class="table table-responsive">

					
				
	
	<td><Button><a href="block1.php?code=<?php echo $s[5] ; ?>" style="text-decoration:none">block</a></Button></td></tr>

					</table>
				<?php
		}
		
	
		$sd=mysql_query("select * from user where status=1 AND email='$email'");
		if($s=mysql_fetch_array($sd)){
			
			
		?>	
		

<table class="table table-responsive">

					
				
	
	<td><Button><a href="unblock1.php?code=<?php echo $s[5] ; ?>" style="text-decoration:none">unblock</a></Button></td></tr>
					
					</table>

<?php
}

?>










					</div>
					</div>
	
			
			
		
<?php
			

		}
	
	}
	
	
 ?>
 