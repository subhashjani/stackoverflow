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



<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="profile.php">profile</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="topq.php" style="color:white" > top-questions</a></li>
	<li><a href="intque.php" style="color:white" >  intersting-questions</a></li>
	<li><a href="allque.php" style="color:white" > all-questions</a></li>
		<li><a href="save1.php" style="color:white" > favourite</a></li>
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
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from user where email='$email' AND status=0");
	if($r=mysql_fetch_array($rs)){
?>
	<div class="container-fluid">
  
<div class="row">
<div class="col-sm-12">

<table class="table table-responsive">
					<tr><td>Name</td><td><?php echo $r[1]; ?></td></tr>
					<tr><td>phone number</td><td><?php echo $r[2]; ?></td></tr>
					<tr><td>email</td><td><?php echo $r[3]; ?></td></tr>
					<tr><td>category</td>
	<?php
	
	

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$rs=mysql_query("select * from user where email='$email'");
	if($r=mysql_fetch_array($rs)){
		
	$rs=mysql_query("select * from catu where status=0 AND email='$email'");
	while($r=mysql_fetch_array($rs)){

?>
<td><?php echo $r[0]; ?></td><br><br>

<?php
	}
	}
?>
		</tr>	
					</table>
			
<div class="row" style="height:50px ; background-color: white; opacity:0.9">
<?php

	$pq=mysql_query("select * from que where email='$email' AND status=0");
	$xy=mysql_num_rows($pq);
?>

<label>total questions:-<?php echo $xy; ?></label><br>
<label>total life line:-
<?php

	$pq=mysql_query("select * from user where email='$email' AND status=0 AND cont=0");
if($p=mysql_fetch_array($pq)){
	echo "100%";
}
	$pq=mysql_query("select * from user where email='$email' AND status=0 AND cont=1");
if($p=mysql_fetch_array($pq)){
	echo "66.66%";
}
	$pq=mysql_query("select * from user where email='$email' AND status=0 AND cont=2");
if($p=mysql_fetch_array($pq)){
	echo "33.33%";
}
	
?>
</label>
</div>

				
<div class="col-sm-2">
</div>

<div class="col-sm-8">
	<br><br>	
					<div class="panel panel-primary">
					    <div class="panel-heading">ask question</div>
						<div class="panel-body">
<form method="post" action="post.php">	

choose question category<br>
<?php


	mysql_connect("localhost","root","");
	mysql_select_db("overflow");

	$rs=mysql_query("select * from user where email='$email'");
	if($r=mysql_fetch_array($rs)){
		
	$rs=mysql_query("select * from catu where status=0 AND email='$email'");
	while($r=mysql_fetch_array($rs)){

?>
<input type="checkbox" name="cat[]"  value="<?php echo $r[0]; ?>"><?php echo $r[0]; ?>

</select>	
<?php
	}
	}
?>
	
<br><br>
question				
<textarea placeholder="enter question" class="form-control" name="ques"></textarea><br>
question description 				
<textarea placeholder="enter question" class="form-control" name="quesd"></textarea><br>


<input type="submit"style="color:blue" value="submit"/></form>
	</div>				
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
<a href="#" style="margin-left:0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a>
		
		<Button  style=" float:right;"><a href="edit.php?code=<?php echo $r[2] ; ?>" style=" text-decoration:none">edit</a></Button>
		<Button style="margin-right:10px; float:right;"><a href="delete.php?code=<?php echo $r[2] ; ?>" style=" text-decoration:none">delete</a></Button>

        <li  class="login"><a href="#"><span class="glyphicon glyphicon-th-list"></span></a></li>
	
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

<div class="modal fade" id="login" role="dialog">
	<div class="modal-dialog" style="width: 300px; height:600px">
		<div class="modal-content">
				
				<div class="modal-body" style="background-color:black; opacity: 0.7"><br>
						<a style="color:white" href="edit.php?code=<?php echo $r[2] ; ?>"><button class="btn btn-warning"  style="width:270px;"><h4  class="glyphicon glyphicon-edit"> edit</h4></button><br><br></a>
						<a style="color:white" href="delete.php?code=<?php echo $r[2] ; ?>"><button class="btn btn-warning" style="width:270px;"><h4 class="glyphicon glyphicon-trash"> delete</h4></button><br><br></a>
						<a style="color:white" href="share.php?code=<?php echo $r[2] ; ?>"><button class="btn btn-warning"  style="width:270px;"><h4 class="glyphicon glyphicon-share"> share</h4></button><br><br></a>
						<a style="color:white" href="save.php?code=<?php echo $r[2] ; ?>"><button class="btn btn-warning"  style="width:270px;"><h4 class="glyphicon glyphicon-bookmark"> save</h4></button><br><br></a>
							
				</div>


		</div>
	</div>


</div>

</div>
</div>
  </div>

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
					
					<div class="container-fluid">
  
<div class="row" style="height:150px ; background-color:#e8e9ea; opacity:0.9">

<div class="col-sm-12">


<div class="col-sm-4">

<div style="margin-top:20px; color:white"><a style=" color:black">privacy</a></div>
<div style="margin-top:20px; color:white"><a  style=" color:black">about us</a></div>
<div style="margin-top:20px; color:white"><a style=" color:black">content us</a></div>
</div>
<div class="col-sm-4">

<div style="margin-top:10px;">
<label><img src="stack.png" style="width: 230px; height: 130px;" class="img-responsive "></label></div>
</div>

<div class="col-sm-4">

<div style="margin-top:50px; float:right" >
<a href="https://twitter.com/Subhash_Jani29?lang=en" style="color: black"><img src="twitter.png" style="width: 50px; height: 40px;" class="img-responsive img-circle"></a></div>

<div style="margin-top:50px; float:right">
<a href="https://twitter.com/Subhash_Jani29?lang=en" style="color: black"><img src="linked.png" style="width: 50px; height: 40px; " class="img-responsive img-circle"></a></div>

<div style="margin-top:50px; float:right">
<a href="https://www.instagram.com/j__a__n__i_/?hl=en" style="color: black"><img src="insta1.png" style="width: 50px; height: 40px; " class="img-responsive img-circle"></a></div>
</div>

 </div>
</div>
  
<div class="row" style="height:50px ; background-color:black; opacity:0.9">
<div style=" margin-top:15px; margin-left:470px">
<a style="color: white; text-decoration:none;"> Passionately created by:</a><a href="https://twitter.com/Subhash_Jani29">Jani </a><span style="color: white">  & </span> <a href="https://www.skillhoard.com/"> skillhoard </a>

 </div>

 </div>

</div>
