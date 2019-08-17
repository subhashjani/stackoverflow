
<?php
	if(!isset($_COOKIE["user"])){
	header("location:login.php");
}
else{
	?>
	share your question
	<?php
	$codeee=$_GET["code"];
	$email=$_COOKIE["user"];
	mysql_connect("localhost","root","");
	mysql_select_db("overflow");
	$rs=mysql_query("select * from user ");
	while($r=mysql_fetch_array($rs)){
		?>
						
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
	
	
	<img src="<?php echo "upload/".$r[3].".jpg"; ?>" style="width: 30px; height: 30px" class="img-responsive img-circle">

<table class="table table-responsive">

					<tr><td><?php echo $r[1]; ?></td>
					<td>
 								
		<td><Button><a href="share1.php?reciver=<?php echo $r[3] ; ?>&codeee=<?php echo $codeee ; ?>">share</a></td></Button></td><tr>
					</table>
						</div>
						</div>
<?php
						}
}
	
	?>