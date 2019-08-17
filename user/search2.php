<html>

	<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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

<div class="sidebar">

  <a href="#"></a><br>
  <a class="active" href="home.php">all Questions</a>
  
  
  <a href="topq.php">top Questions</a>
  <?php

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$rs=mysql_query("select * from cat where status=0");
	
while($r=mysql_fetch_array($rs)){
?>
<a href="c.php?cat=<?php echo $r[2] ; ?>" ><?php echo $r[2] ; ?></a>
<?php
	}
?>
</div>


<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.8">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="stgflow.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="home.php">home</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="reg.php" style="color:white" > registration</a></li>
	<li><a href="login.php" style="color:white" > login</a></li>
	
	
	</ul>
	</div>
	
</nav>

<div class="container-fluid">

<div class="row">

<div class="col-sm-2">
</div>

<div class="col-sm-8">
<form method="post" action="search2.php">
<table  class="table table-responsive"><tr>
<td><input type="text" class="form-control" name="ques" placeholder="search question">
</td><td><input type="submit" value="search"><a class="glyphicon glyphicon-search"></a></td></tr></table>
</form>
	

<?php
if(empty($_POST["ques"])){
	header("location:home.php");
}
else{
$ques=$_POST["ques"];

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where status=0 AND ques='$ques'");
	if($r=mysql_fetch_array($rs)){
            ?>
			

<table class="table table-responsive">
<tr>
<td 
>
<div>

<a href="cc.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a>
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

	<a href="like.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px; color:#595959"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px; color:#595959"></i></a>
 	<?php
echo $xy;
	
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 270px; color:#595959"></i>

	<?php
echo $r[7];
?>


<a href="cc.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 300px; color:#595959"></i></a>

	<?php
echo $r[8];
?>

</div>
  

			<?php
	
	}		
	
	}	
?>

</div>
  </div>
  </div>
</body>
</html>
