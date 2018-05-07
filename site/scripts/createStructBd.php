<?php
	include "../config/dbConnectParams.php";
	
	$sqlLink = mysqli_connect($sqlHost, $sqlUser, $sqlPass);
	$sql ="CREATE DATABASE $sqlNameBd";
	
	if(mysqli_query($sqlLink, $sql)) {
		echo "Base ($sqlNameBd) was created";
	}
	else {
		echo "Error creacting:". mysqli_error($sqlLink);
	}
	
	mysqli_close($sqlLink);
	echo "<br />Database connection is closed<br />";
	
	include "tables/createAuthorTable.php";
	include "tables/createNewsTable.php";
	include "tables/createRubricsTable.php";
?>