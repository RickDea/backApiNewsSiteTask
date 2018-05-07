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
	
	$sql = "CREATE TABLE $sqlTableAuthorName(
			id INT NOT NULL AUTO_INCREMENT,
			nickName VARCHAR(15) NOT NULL,
			fullName VARCHAR(50) NOT NULL,
			urlImage VARCHAR(256) NOT NULL,
			primary key (id),
			key (nickName)
		)
		ENGINE=$sqlEngine
		DEFAULT CHARSET=$sqlEncoding";
	
	if (mysqli_query($sqlLink, $sql)){
		echo "Table ($sqlTableAuthorName) was created!<br />";
	}
	else {
		echo "Error created table ($sqlTableAuthorName)<br />";
	}
	
	mysqli_close($sqlLink);
	echo "Database connection is closed<br />";
?>