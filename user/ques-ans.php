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



<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:black ; ">
<div class="container-fluid">
<div class="navbar-header" >
	<a  class="navbar-brand" href="home.php" style="float: left ; color:white">stgflow.com</a>
	
</div>
 <ul class="nav navbar-nav">
        <li class="active"  style="color:white"><a href="ques-ans.php">question-answer</a></li>

      </ul>
<ul class="nav navbar-nav navbar-right">

	<li><a href="profile.php" style="color:white" > profile</a></li>
	<li><a href="topq.php" style="color:white" > top-questions</a></li>
	<li><a href="intque.php" style="color:white" > intersting-questions</a></li>
	<li><a href="allque.php" style="color:white" > all-questions</a></li>
	
	
	</ul>
	</div>
	
</nav>


<div class="container-fluid">

<div class="row">

<div class="col-sm-12">

             <div class="col-sm-2">

</div>
             <div class="col-sm-8" style="margin-top:60px">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">question-answer</div>
						<div class="panel-body">
<?php
   
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	$email=$_COOKIE["user"];
	  
	$code=$_GET["code"];
	
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
$rs=mysql_query("select * from que where code='$code' AND status=0");
while($r=mysql_fetch_array($rs)){
		?>
	<div style="width: 780px;
    border: 3px solid gray ;
    padding: 0px;
    margin: 5px;"
>

<?php
$eemail=$r[1];
$vr=mysql_query("select * from user where email='$eemail'");
if($v=mysql_fetch_array($vr)){
?>

		<a href="userprofile.php?code=<?php echo $v[5] ; ?> " style=" margin-left: 0px; text-decoration:none">

<?php echo $r[11] ; ?>  </a>
<?php
}
?>
	<a  style="color: black; float:right; text-decoration:none">

<?php echo $r[4] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="report.php?code=<?php echo $r[2] ; ?>">report</a></Button><br>


		
<a href="ques-ans.php?code=<?php echo $r[2] ; ?>"  style="font-family:bold; font-size:22px;color:black; text-decoration:none"><?php echo $r[3] ; ?></a> <br>  
<a style="font-family:bold; font-size:20px;color:black; text-decoration:none">description:-<?php echo $r[10] ; ?>  </a><br>
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

<div class="row" style="height:28px ;  margin: 2px; background-color:#f1f1f1">

<?php

$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND likeq=1");
	$xy=mysql_num_rows($pq);
?>

	<a href="like.php?code=<?php echo $r[2] ; ?>&flag5=1"><i class="glyphicon glyphicon-thumbs-up" style="margin-left: 40px"></i></a>
 	<?php
echo $xy;
?>
<?php
$code=$r[2];
	$pq=mysql_query("select * from likeunlikeq where qcode='$code' AND status=0 AND unlikeq=1");
	$xy=mysql_num_rows($pq);
?>
	<a href="unlikeque.php?code=<?php echo $r[2] ; ?>&flag5=1"><i class="glyphicon glyphicon-thumbs-down" style="margin-left: 35px"></i></a>
 	<?php
echo $xy;
	
?>

<i class="glyphicon glyphicon-eye-open" style="margin-left: 200px"></i>
	<?php
echo $r[7];
?>

<a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><i class="glyphicon glyphicon-comment" style="margin-left: 300px"></i></a>


<?php
echo $r[8];

?>
</div>
</div><br>
		<form method="post" action="show.php">
		
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
		answer<textarea placeholder="enter answer" class="form-control" name="ans"></textarea><br>
         <button class="btn btn-warning"><a style="color:black; text-decoration:none">post</a></button></form><br><br>
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


<?php
$eeemail=$a[5];
$bn=mysql_query("select * from user where email='$eeemail'");
if($b=mysql_fetch_array($bn)){
?>

		<a href="userprofile1.php?code=<?php echo $b[5] ; ?> " style=" margin-left: 0px; text-decoration:none">

<?php echo $a[7] ; ?>  </a>
<?php
}
?>
		<a  style="color: black; float:right; text-decoration:none">

<?php echo $a[3] ; ?>  </a>
		<Button style="color: black; float:right"><a style="text-decoration:none" href="report1.php?code=<?php echo $a[1] ; ?>&qcode=<?php echo $r[2] ; ?>">report</a></Button><br>


<a   style="font-family:bold; font-size:20px;color:black; text-decoration:none">
 
<?php echo $a[2] ; ?>  </a><br>
<?php	
$code=$a[1];
	$gh=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND likea=1");
	$jk=mysql_num_rows($gh);
	?>
		<a href="likea.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>&flag5=1" style=" margin-left:680px " class="glyphicon glyphicon-thumbs-up"></a>
	
		<?php
echo $jk;
?>
	<?php	
$code=$a[1];
	$cn=mysql_query("select * from likeunlikea where acode='$code' AND status=0 AND unlikea=1");
	$mn=mysql_num_rows($cn);
	?>
		<a href="unlikea.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>&flag5=1" style=" margin-left:25px " class="glyphicon glyphicon-thumbs-down"></a>
		
		<?php
echo $mn;
?>
</div><br>
<?php
	}
		
			$code=$r[2];
		$v_p=$code."_".$email;
		$rs=mysql_query("select * from queview");
		$count=0;
		$sn=0;
		$ab=mysql_query("select max(sn) from queview");

		if($aba=mysql_fetch_array($ab)){
			$sn=$aba[0];
		}
		$sn++;
		
		while($r=mysql_fetch_array($rs)){
			if($r[1]!=$v_p){
				$count++;
			}
		}

		if($sn==$count+1){
			mysql_query("insert into queview values($sn,'$v_p')");
			mysql_query("update que set view=view + 1 where code='$code'");
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