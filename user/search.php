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
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
<ul class="nav navbar-nav navbar-right">

	<li><a href="intque.php" style="color:white" > intersting-question</a></li>
	<li><a href="allque.php" style="color:white" > all-question</a></li>
	<li><a href="profile.php" style="color:white" > profile</a></li>
	
	
	</ul>
	</div>
	
</nav>

<div class="col-sm-12">
<div class="col-sm-2">
</div>
<div class="col-sm-8">

	
				<div class="panel panel-primary">
					    <div class="panel-heading">search question</div>
						<div class="panel-body">
<form method="post" action="search.php">	
	
<textarea placeholder="enter question" class="form-control" name="ques"></textarea><br>

<input type="submit"style="color:blue" value="submit"/></form>
	</div>				
	</div>
			
				<div class="panel panel-primary">
					    <div class="panel-heading">questions</div>
						<div class="panel-body">
		
	<?php
		//$cat=$r[0];
		
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$ques=$_POST["ques"];
	$rs=mysql_query("select * from que where status=0 AND ques='$ques'");
	while($r=mysql_fetch_array($rs)){
            ?>
			

<table class="table table-responsive">
<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>

		<Button style="margin-left: 665px"><a href="share.php?code=<?php echo $r[2] ; ?>">share</a></Button>
		<Button><a href="save.php?code=<?php echo $r[2] ; ?>">save</a></Button>
<a href="home.php" style="color: black"><img src="<?php echo "upload/".$r[1].".jpg"; ?>" style="width: 50px; height: 50px;" class="img-responsive img-circle">

<?php echo $r[11] ; ?>  </a>
<h3><a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a></h3> 

<div class="row" style="height:28px ;  margin: 2px; background-color:#DEDBDB">
<i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i>
 	<?php
echo $r[6];
?>
<i class="glyphicon glyphicon-eye-open" style="margin-left: 300px"></i>

	<?php
echo $r[7];
?>


<i class="glyphicon glyphicon-comment" style="margin-left: 330px"></i>
<?php
echo $r[8];
?>
</div>
  
  </div>
</div>
  </div>

			<?php
	}
			
	
		
?>
</div>
</div>
</div>
</div>
