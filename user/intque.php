<?php
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	?>
<html>

	<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
	

<body>



<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; opacity:1; height :50px ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="intque.php">intersting-question</a></li>

      </ul>
	
	<input type="text" name="ques" placeholder="search here...." style="margin-top : 10px; margin-left: 150px; width:500px">
	<a href="profile.php" style="margin-left : 150px; color:white; text-decoration:none;" > profile</a>
	<a href="allque.php" style="margin-left : 25px; color:white; text-decoration:none;" >all-question </a>
	<a href="topq.php" style="margin-left : 25px; color:white; text-decoration:none;" > top-question</a>
	
	</div>
</div>
</nav>
<div class="container-fluid">
<div class="col-sm-12">
<div class="col-sm-2">
</div>
<div class="col-sm-8" style="margin-top:70px">



			
		
	<?php
		//$cat=$r[0];
		
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$arr=array();
		$email=$_COOKIE["user"];
	$ab=mysql_query("select * from catu where status=0 AND email='$email'");
	while($a=mysql_fetch_array($ab)){
		$cat=$a[0];
	$pq=mysql_query("select * from qcat where cat='$cat'");
	while($p=mysql_fetch_array($pq)){
		$code=$p[2];
	$rs=mysql_query("select * from que where code='$code' AND status=0");
	while($r=mysql_fetch_array($rs)){
		
		$count=0;
		for($i=0;$i<sizeof($arr);$i++){
			if($arr[$i]==$r[2]){
				$count=1;
			}
		}
		if($count==0){
			array_push($arr,$r[2]);
		}
	}}}
	for($i=0;$i<sizeof($arr);$i++){
		$as=mysql_query("select * from que where code='$arr[$i]'");
		$asd=mysql_fetch_array($as);
		
			
			?>
			

<div style="width: 780px;
    border: 3px solid gray ;
    padding: 0px;
    margin: 5px;"
>

<?php $rel= "<a id=$asd[2]><a href='ques-ans.php?code=$asd[2]' style='font-family:bold; font-size:22px;color:black; text-decoration:none;' >$asd[3]</a>";
echo $rel;
?> 

</a><br>
<?php
$qcode=$asd[2];
	
	$ut=mysql_query("select * from qcat where qcode='$qcode'");
	while($u=mysql_fetch_array($ut)){

?>
<div class="badge">
<a href="c.php?code=<?php echo $u[2] ; ?>" style="color:white"><?php echo $u[1]; ?></a>
</div>
<?php
	}	
	
?>

<div class="row" style="height:28px ;  margin: 2px; background-color:#f1f1f1">
<?php
$code=$asd[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<a href="like.php?code=<?php echo $asd[2] ; ?>&flag2=1"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 30px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$asd[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $asd[2] ; ?>&flag2=1"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>

<i class="glyphicon glyphicon-eye-open" style="margin-left: 270px"></i>

	<?php
echo $asd[7];
?>

<a href="ques-ans.php?code=<?php echo $asd[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 300px"></i></a>
<?php
echo $asd[8];
	}?>
	
  </div>
</div>
</div>
  <div class="col-sm-2">
</div>
  

  </div></div>
  <?php
}
  ?>
  </body>
  </html>