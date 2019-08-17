<html>

	<head>
	


		<link rel="stylesheet" href="bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




</head>
	

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="#">user-profile</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="home.php" style="color:white" > home</a></li>
	<li><a href="reg.php" style="color:white" >  sign-up</a></li>
	<li><a href="login.php" style="color:white" > login</a></li>
	
	
	</ul>
	</div>
	
</nav>



<?php

		$code=$_REQUEST["code"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		$rs=mysql_query("select * from user where code='$code'")or die(mysql_error());
		

		if($r=mysql_fetch_array($rs)){
			$email=$r[3];
		
			?>
<div class="col-sm-12">
<div class="col-sm-3">

</div>




<div class="col-sm-8" style="margin-top:60px">
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

</div>
		<div class="panel panel-primary">
					    <div class="panel-heading">your questions</div>
						<div class="panel-body">
		
	<?php
		$cat=$r[0];
		
	$rs=mysql_query("select * from que where email='$email' AND status=0");
	while($r=mysql_fetch_array($rs)){
		
            ?>
			


<div style="width: 780px;
    border: 2px solid gray ;
    padding: 0px;
    margin: 5px;"
>
<?php
$eemail=$r[1];
$vr=mysql_query("select * from user where email='$eemail'");
if($v=mysql_fetch_array($vr)){
?>

		<a href="userprofile1.php?code=<?php echo $v[5] ; ?> " style=" margin-left: 0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a><br>
<?php
}
?>
		
	
<a style="font-family:bold; font-size:22px;color:black; text-decoration:none;" href="ques-ans.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a>  
<br>
<?php
$qcode=$r[2];
	
	$lk=mysql_query("select * from qcat where qcode='$qcode'");
	while($l=mysql_fetch_array($lk)){

?>
<div class="badge">
<a href="c.php?code=<?php echo $l[3] ; ?>" style="color:white"><?php echo $l[1]; ?></a>
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

	<div><a href="like.php?code=<?php echo $r[2] ; ?>&flag=1"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>&flag=1"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 300px"></i>
	<?php
echo $r[7];
	
?>

<a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 280px"></i></a>
<?php
echo $r[8];
	
?>


</div>
</div>
  </div>

			<?php
	}
	
			
}	
		
?>
</div>
</div>







					</div>
					</div>
	
			
			
		
<?php
			

		
	
	
	
 ?>
 