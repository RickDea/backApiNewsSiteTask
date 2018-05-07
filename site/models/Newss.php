<?php
	class Newss {
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
		
		//Поиск по автору
		public static function getNewsByAuthor ($authorNickName) {
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableNewsName} WHERE author ='{$authorNickName}'";
			return json_encode(self::request($sql));
		}
		
		//Поиск по рубрике
		public static function getNewsByRubric($rubric) {
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableNewsName} WHERE rubric LIKE '%{$rubric}%'";
			return json_encode(self::request($sql));
		}
		
		//Поиск по Ид
		public static function getNewsById($id) {
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableNewsName} WHERE id ='{$id}'";
			return json_encode(self::request($sql));
		}
		
		//Поиск по рубрике + по дочерним рубрикам
		public static function getNewsByParentRubric($rubric) {
			//Запрашиваем массив всех подрубрик целевой рубрики
			require_once 'models/Rubrics.php';
			$arrayRubric = Rubrics::getRubricByParentRubric($rubric);
			$arrayRubric = implode("%' OR rubric LIKE '%",$arrayRubric);
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableNewsName} WHERE rubric LIKE '%{$arrayRubric}%'";
			return json_encode(self::request($sql));
		}
		
		//Поиск по названию
		public static function getNewsByName($name) {
			include 'config/dbConnectParams.php';
			$sql="SELECT * FROM {$sqlTableNewsName} WHERE header ='{$name}'";
			return json_encode(self::request($sql));
		}
	}
?>