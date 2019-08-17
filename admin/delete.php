<?php
	if($_REQUEST["id"])
	{
		$id=$_REQUEST["id"];
		mysql_connect("localhost","root","");
		mysql_select_db("overflow");
		
		mysql_query("delete from cat where sn=$id");
	}
	?>