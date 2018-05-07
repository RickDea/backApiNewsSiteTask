<?php
	include 'config/dbConnectParams.php';
	$sqlLink = mysqli_connect($sqlHost, $sqlUser, $sqlPass);
	mysqli_select_db($sqlLink,$sqlNameBd);
?>