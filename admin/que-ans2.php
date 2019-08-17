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

<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.8">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="#">question-answer</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="user.php" style="color:white" > all questions</a></li>
	<li><a href="user.php" style="color:white" > users</a></li>
	
	<li><a href="profile.php" style="color:white" > admin-penal</a></li>
	
	</ul>
	</div>
	
</nav>

<div class="container-fluid">

<div class="row">

<div class="col-sm-12">

             <div class="col-sm-2">

</div>
             <div class="col-sm-8" style="margin-top:60px">	
<?php

	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	
	$reader=$_COOKIE["user"];
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code' AND status=0");

if($r=mysql_fetch_array($rs)){
		if(isset($_GET["flag"])){
			
$vc=mysql_query("select * from reporta where qcode='$code' ");

if($v=mysql_fetch_array($vc)){
echo $v[2];
}
		
	}

?>			 
				<div class="panel panel-primary">
					    <div class="panel-heading">question-answer</div>
						<div class="panel-body">
<?php
   
		?>
	<div style="width: 780px;
    border: 3px solid gray ;
    padding: 0px;
    margin: 5px;"
>

		<a href="userprofile.php?code=<?php echo $r[2] ; ?>" style=" margin-left: 0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a>
		<a  style="color: black; float:right; text-decoration:none">

<?php echo $r[4] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="blockque.php?code=<?php echo $r[2] ; ?>">block</a></Button><br>


		
<a href="que-ans2.php?code=<?php echo $r[2] ; ?>"  style="font-family:bold; font-size:22px;color:black; text-decoration:none"><?php echo $r[3] ; ?></a> <br>  
<a style="font-family:bold; font-size:20px;color:black; text-decoration:none">description:-<?php echo $r[10] ; ?>  </a><br>
<?php
$qcode=$r[2];
	
	$ab=mysql_query("select * from qcat where qcode='$qcode'");
	while($a=mysql_fetch_array($ab)){

?>
<div class="badge">
<a  href="http://127.0.0.1/stage%20overflow/user/c.php?code=<?php echo $a[3] ; ?>" style="color:white"><?php echo $a[1]; ?></a>
</div>
<?php
	}	
	
?>

<div class="row" style="height:28px ;  margin: 2px; background-color:#f1f1f1">

<?php

$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<i class="glyphicon glyphicon-thumbs-up" style="margin-left: 40px"></i>
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

<i class="glyphicon glyphicon-eye-open" style="margin-left: 200px"></i>
	<?php
echo $r[7];
?>

<i class="glyphicon glyphicon-comment" style="margin-left: 300px"></i>


<?php
echo $r[8];

?>
</div>
</div><br>
	<?php

		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=0");
	while($a=mysql_fetch_array($ab)){
		?>
	<div style="width: 780px;
    border: 2px solid gray ;
    padding: 0px;
    margin: 5px;"
>



		<a href="#" style=" margin-left: 0px; text-decoration:none" >

<?php echo $a[7] ; ?>  </a>

		<a  style="color: black; float:right; text-decoration:none">

<?php echo $a[3] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="blockans.php?code=<?php echo $a[1] ; ?>">block</a></Button><br>


<a   style="font-family:bold; font-size:20px;color:black; text-decoration:none">
 
<?php echo $a[2] ; ?>  </a><br>
<?php	
$code=$a[1];
	$gh=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND likea=1");
	$jk=mysql_num_rows($gh);
	?>
		<label style=" margin-left:680px " class="glyphicon glyphicon-thumbs-up"></label>
	
		<?php
echo $jk;
?>
	<?php	
$code=$a[1];
	$gh=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND unlikea=1");
	$jk=mysql_num_rows($gh);
	?>
		<label style=" margin-left:25px " class="glyphicon glyphicon-thumbs-down"></label>
		
		<?php
echo $jk;
?>
</div><br>
<?php
	}
	
	
	}
}
			
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>