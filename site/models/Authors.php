<?php
	class Authors {
		//Запрос к БД
		private static function request($sql){
			include 'db_connect.php';
			$result = mysqli_query($sqlLink,$sql) or trigger_error(mysqli_error($sqlLink)." in ". $sql);
			$arrayReault = array();
			do {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				if($row) array_push($arrayReault, $row);
			}
			while ($row);
			mysqli_free_result($result);
			mysqli_close($sqlLink);
			return $arrayReault;
		}
		//Список всех авторов
		public static function getAuthorsAll() {
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableAuthorName}";
			return json_encode(self::request($sql));
		}
		
	}
?>