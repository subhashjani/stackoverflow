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
		$email=$_REQUEST["email"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$gh=mysql_query("select * from user where email='$email'")or die(mysql_error());
		

		if($g=mysql_fetch_array($gh)){
		
			$email=$g[3];
			?>
<div class="col-sm-12">
<div class="col-sm-3">
<div class="sidebar">
<a href="userprofile.php?code=<?php echo $g[5] ; ?>" class="list-group-item list-group-item-action ">user profile</a>
<a href="userans.php?email=<?php echo $g[3] ; ?>" class="list-group-item list-group-item-action active">user answers</a>
<a href="userque.php?email=<?php echo $g[3] ; ?>" class="list-group-item list-group-item-action ">user questions</a>

</div>
</div>




<div class="col-sm-8">
	
	<?php
		$cat=$g[0];
		
	$tr=mysql_query("select * from ans where froms='$email' AND  status=0 ");
	while($t=mysql_fetch_array($tr)){
		$code=$t[6];
	$rs=mysql_query("select * from que where code='$code' AND status=0");
	while($r=mysql_fetch_array($rs)){
		
            ?>
			


<div style="width: 780px;
    border: 2px solid gray ;
    padding: 0px;
    margin: 5px;"
>
<a  href="userprofile.php?code=<?php echo $g[5] ; ?>" style="margin-left:0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a><br>
		

	
<a style="font-family:bold; font-size:22px;color:black; text-decoration:none;" href="que-ans2.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a>  
<br>
<?php
$qcode=$r[2];
	
	$ab=mysql_query("select * from qcat where qcode='$qcode'");
	while($a=mysql_fetch_array($ab)){

?>
<div class="badge">
<a href="http://127.0.0.1/stage%20overflow/user/c.php?code=<?php echo $a[3] ; ?>" style="color:white"><?php echo $a[1]; ?></a>
</div>
<?php
	}	
	
?>

<div class="row" style="height:28px ;  margin: 2px; background-color: #f1f1f1">
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<div><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i>
 	<?php
echo $xy;
	
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 300px"></i>
	<?php
echo $r[7];
	
?>
<i class="glyphicon glyphicon-comment" style="margin-left: 280px"></i>
<?php
echo $r[8];
	
?>
<?php
	}
	}
		}
	}
	?>
	</div>
	
	</div>
	</div>
	</div>
	</div>
	</body>
	</html>