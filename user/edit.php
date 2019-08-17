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
	

<body style="background-image:url(sub.jpg)">



<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.6">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="stgflow.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="edit.php">edit</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="profile.php" style="color:white" > profile</a></li>
	<li><a href="logout.php" style="color:white" > logout</a></li>
	
	
	</ul>
	</div>
	
</nav>







<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	
	$email=$_COOKIE["user"];
	$code=$_GET["code"];
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	
	$as=mysql_query("select * from ans where codee='$code'");
	if($a=mysql_fetch_array($as)){

       echo "not edit! you can only delete this question ";		
	}
else{
	$rs=mysql_query("select * from que where code='$code'");
	while($r=mysql_fetch_array($rs)){
		
		
		?>
		

<div class="container-fluid">

<div class="row">

<div class="col-sm-12">
<div class="col-sm-1" >
</div>

<div class="col-sm-10">
				<div class="panel panel-primary">
					    <div class="panel-heading">edit question</div>
						<div class="panel-body">
select question category<form method="post" action="update.php">	
	<input type="checkbox" name="cat[]" value="php">php

<input type="checkbox" name="cat[]" value="java">java

<input type="checkbox" name="cat[]" value="c">c<br><br>

edit question<input type="text"  class="form-control" value="<?php echo $r[3]; ?>" name="ques"><br>
edit description<input type="text"  class="form-control" value="<?php echo $r[10]; ?>" name="quesd"><br>

 								<input type="hidden" name="code" value="<?php echo $r[2]; ?>" >
<input type="submit"style="color:blue" value="submit"/></form>
	</div>				
	</div>
	
	<?php
	}
}
}
	?>
	</div>				
	</div>
	<div class="col-sm-1">
	</div>
	</div>				
	</div>
	</body>
	</html>