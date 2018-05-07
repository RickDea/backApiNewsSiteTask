<?php
	//include "../../config/dbConnectParams.php";
	
	$sqlLink = mysqli_connect($sqlHost, $sqlUser, $sqlPass);
	
	if(!$sqlLink) {
		echo"Connect is failed<br />";
	}
	else{
		echo "Connect to base data successful!<br />";
	}
	
	mysqli_select_db($sqlLink,$sqlNameBd);
	
	$sql = "CREATE TABLE $sqlTableNewsName(
			id INT NOT NULL AUTO_INCREMENT,
			header VARCHAR(150) NOT NULL,
			preview VARCHAR(535) NOT NULL,
			text TEXT NOT NULL,
			author VARCHAR(50) NOT NULL,
			rubric TEXT,
			primary key (id),
			key (author)
		)
		ENGINE=$sqlEngine
		DEFAULT CHARSET=$sqlEncoding";
	
	if (mysqli_query($sqlLink, $sql)){
		echo "Table ($sqlTableNewsName) was created!<br />";
	}
	else {
		echo "Error created table ($sqlTableNewsName)<br />";
	}
	
	mysqli_close($sqlLink);
	echo "Database connection is closed<br />";
?>