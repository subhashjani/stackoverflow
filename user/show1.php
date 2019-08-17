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
             <div class="col-sm-2">

</div>
             <div class="col-sm-8">			 
				<div class="panel panel-primary">
					    <div class="panel-heading">question-answer</div>
						<div class="panel-body">
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
while($r=mysql_fetch_array($rs)){
		?>
	<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>


		<Button style="margin-left: 665px"><a href="share.php?code=<?php echo $r[2] ; ?>">share</a></Button>
		<Button><a href="save.php?code=<?php echo $r[2] ; ?>">save</a></Button>
        <li  class="login"><a href="#"><span class="glyphicon glyphicon-th-list"></span></a></li>
		
<h3><b>question:-</b><a href="ques-ans.php?code=<?php echo $r[2] ; ?>"><?php echo $r[3] ; ?></a>   </h3>
<h3><b>question description:-</b><?php echo $r[10] ; ?>  </h3>
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
</div><br>
		<form method="post" action="show.php">
		
						 								<input type="hidden" name="code" value="<?php echo $r[2] ; ?>" >
		answer<textarea placeholder="enter answer" class="form-control" name="ans"></textarea><br>
         <button class="btn btn-warning"><a style="color:black">post</a></button></form><br><br>
	<?php

		$codee=$r[2];
$ab=mysql_query("select * from ans where codee='$codee' AND status=0");
	while($a=mysql_fetch_array($ab)){
		?>
	<div style="width: 780px;
    border: 5px solid black ;
    padding: 0px;
    margin: 5px;"
>


		<li  class="login"><a href="#"><span class="glyphicon glyphicon-th-list"></span></a></li>
<h3><?php echo $a[2] ; ?> </h3>

		<a href="like.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>" style=" margin-left:700px " class="glyphicon glyphicon-thumbs-up"></a>
		<a href="unlikeque.php?codee=<?php echo $a[6] ; ?>&code=<?php echo $a[1] ; ?>" style=" margin-left:25px " class="glyphicon glyphicon-thumbs-down"></a>
</div><br>
<?php
	}
		
			$code=$r[2];
		$v_p=$code."_".$reader;
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
