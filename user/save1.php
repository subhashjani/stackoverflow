<?php
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	?>
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

</head>
	

<body>


<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1; height :50px ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="save1.php">favourite</a></li>

      </ul>
	
	<input type="text" name="ques" placeholder="search here...." style="margin-top : 10px; margin-left: 150px; width:500px">
	<a href="profile.php" style="margin-left : 80px; color:white; text-decoration:none;" > profile</a>
	<a href="intque.php" style="margin-left : 25px; color:white; text-decoration:none;" > intersting-question</a>
	<a href="topq.php" style="margin-left : 25px; color:white; text-decoration:none;" > top-question</a>
	<a href="allque.php" style="margin-left : 25px; color:white; text-decoration:none;" > top-question</a>
	
	</div>
</div>
</nav>
             <div class="col-sm-2">

</div>
             <div class="col-sm-8" style="margin-top:60px;">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">favourite questions</div>
						<div class="panel-body">
<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
 $email=$_COOKIE["user"];

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$ab=mysql_query("select * from saveque where email='$email' and status=0");
	while($a=mysql_fetch_array($ab)){
		$code=$a[1];
		
	$rs=mysql_query("select * from que where code='$code' AND status=0");
	while($r=mysql_fetch_array($rs)){
		          ?>
			
				


<div style="width: 780px;
    border: 3px solid gray ;
    padding: 0px;
    margin: 5px;"
>


	
<a  style="font-family:bold; font-size:22px;color:black; text-decoration:none;" href="ques-ans.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a> <br>  
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

		<Button style="float:right"><a href="unsave.php?code=<?php echo $r[2] ; ?>">remove</a></Button><br>
<div class="row" style="height:28px ;  margin: 2px; background-color:#f1f1f1">
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<a href="like.php?code=<?php echo $r[2] ; ?>&flag4=1"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>&flag4=1"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>

<i class="glyphicon glyphicon-eye-open" style="margin-left: 270px"></i>
	<?php
echo $r[7];
?>

<a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 230px"></i></a>


<?php
echo $r[8];

?>
</div>
</div><br>
<?php
	}
	}
}
?>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>