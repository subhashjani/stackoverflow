<html>

	<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
        <li class="active"  style="color:white"><a href="showque.php">question-anwer</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">
	<li><a href="ques.php" style="color:white" >question</a></li>
	<li><a href="user.php" style="color:white" > user-profiles</a></li>
	<li><a href="profile.php" style="color:white" > profile</a></li>
	
	
	</ul>
	</div>
	
</nav>

<div class="container-fluid">
<div style="width:600px ; margin-left:500px">
<form method="post" action="searchque.php">

question<input type="text" name="ques" required="required" placeholder="enter question" class="form-control">

            <input type="submit" value="Search" class="btn btn-default" style="background-color:#333 ; color:white ; border:none" />  

</form>
	</div>

<div class="row">
<div class="col-sm-3">					    

	<div   class="panel panel-primary">
	
<div class="panel-heading">Daskboard</div>

<div class="list-group panel-body" style="height: 540px">
<a href="ques.php" class="list-group-item list-group-item-action ">home</a>

<?php

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$rs=mysql_query("select * from cat where status=0");
	
while($r=mysql_fetch_array($rs)){
?>

<a href="ques1.php?cat=<?php echo $r[2] ; ?>" class="list-group-item list-group-item-action"><?php echo $r[2] ; ?></a>
<?php
	}
?>


</div>
</div>
</div>


             <div class="col-sm-8">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">question-answer</div>
						<div class="panel-body">
<?php
   
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code'");
while($r=mysql_fetch_array($rs)){
	
	?>
<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
><br>


<a href="home.php" style="color: black"><img src="<?php echo "upload/".$r[1].".jpg"; ?>" style="width: 50px; height: 50px;" class="img-responsive img-circle">

<?php echo $r[11] ; ?>  </a>
<h3><a href="showque.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a></h3><br>  

<div class="row" style="height:28px ;  margin: 2px; background-color:#DEDBDB">
<div><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i>
 	<?php
echo $r[6];
?>
	<i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i>
 	<?php
echo $r[9];
	
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 300px"></i>

	<?php
	
echo $r[7];
?>
<i class="glyphicon glyphicon-comment" style="margin-left: 280px"></i>
<?php
echo $r[8];
?>
	</div></div></div>
	<?php
	

		
		?>
		
		<?php



		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=0")or die(mysql_error());
	while($a=mysql_fetch_array($ab)){
		?>
		<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>

<a href="home.php" style="color: black"><img src="<?php echo "upload/".$a[5].".jpg"; ?>" style="width: 50px; height: 50px;" class="img-responsive img-circle">

<?php echo $a[7] ; ?>  </a>
		
<?php echo $a[2] ; ?>  
 								
		<Button><a href="blockans.php?code=<?php echo $a[1] ; ?>">block-answer</a></Button></div>
	<?php
	}	
	
				$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=1");
	while($a=mysql_fetch_array($ab)){
		?>
		<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>

<a href="home.php" style="color: black"><img src="<?php echo "upload/".$a[5].".jpg"; ?>" style="width: 50px; height: 50px;" class="img-responsive img-circle">

<?php echo $a[7] ; ?>  </a>
		
	<form method="post" action="unblockans.php">
						
 								<input type="hidden" name="code" value="<?php echo $a[1] ; ?>" >
 								
		<Button>unblock-answer</Button></form></div>
	<?php
	}
	}
?>	
</div></div></div>