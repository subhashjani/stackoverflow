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



<nav class="navbar navbar-inverse" style="background-color:black ; opacity:0.6">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="share2.php">get quetions</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="profile.php" style="color:white" > profile</a></li>
	<li><a href="topq.php" style="color:white" > top-questions</a></li>
	<li><a href="intque.php" style="color:white" > intersting-questions</a></li>
	<li><a href="allque.php" style="color:white" > all-questions</a></li>
	
	
	</ul>
	</div>
	
</nav>
             <div class="col-sm-2">

</div>
             <div class="col-sm-8">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">get questions</div>
						<div class="panel-body">
<?php
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
 $email=$_COOKIE["user"];

	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$ab=mysql_query("select * from shareq where reciver='$email' and status=0");
	while($a=mysql_fetch_array($ab)){
		$code=$a[3];
		
	$rs=mysql_query("select * from que where code='$code' AND status=0");
	while($r=mysql_fetch_array($rs)){
		
		
		?>
	<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>


		<Button style="margin-left: 650px"><a href="share.php?code=<?php echo $r[2] ; ?>">share</a></Button>
		<Button><a href="remove.php?code=<?php echo $r[2] ; ?>">remove</a></Button>
		<a href="home.php" style="color: black"><img src="<?php echo "upload/".$r[1].".jpg"; ?>" style="width: 50px; height: 50px;" class="img-responsive img-circle">

<?php echo $r[11] ; ?>  </a>
<h3><a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a>   </h3>

<div class="row" style="height:28px ;  margin: 2px; background-color:#DEDBDB">
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<a href="like.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>

<i class="glyphicon glyphicon-eye-open" style="margin-left: 270px"></i>
	<?php
echo $r[7];
?>

<a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 300px"></i></a>


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
</body>
</html>
		
		
		