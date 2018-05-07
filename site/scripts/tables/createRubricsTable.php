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
	
	$sql = "CREATE TABLE $sqlTableRubricName(
			id INT NOT NULL AUTO_INCREMENT,
			name VARCHAR(30) NOT NULL,
			parentId INT,
			primary key (id),
			key (name,parentId)
		)
		ENGINE=$sqlEngine
		DEFAULT CHARSET=$sqlEncoding";
	
	if (mysqli_query($sqlLink, $sql)){
		echo "Table ($sqlTableRubricName) was created!<br />";
	}
	else {
		echo "Error created table ($sqlTableRubricName)<br />";
	}
	
	mysqli_close($sqlLink);
	echo "Database connection is closed<br />";
?>