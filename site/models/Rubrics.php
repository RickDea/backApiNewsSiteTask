<?php
	class Rubrics {
		
		//Возвращает Ид рубрики по имени
		private static function rubricGetIdByName($name) {
			include 'db_connect.php';
			$sql="SELECT `id` FROM {$sqlTableRubricName} WHERE name = '{$name}'";
			$result = mysqli_query($sqlLink,$sql) or trigger_error(mysqli_error($sqlLink)." in ". $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			mysqli_close($sqlLink);
			$targetId = $row[id];
			return $targetId;
		}
		
		//Возвращает всех потомков целевой рубрики по ее ИД
		private static function rubricGetChildById($id) {
			include 'db_connect.php';
			$sql="SELECT `id`, `name` FROM {$sqlTableRubricName} WHERE parentId = '{$id}'";
			$result = mysqli_query($sqlLink,$sql) or trigger_error(mysqli_error($sqlLink)." in ". $sql);
			$arrayReault = array();
			do {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				if($row) array_push($arrayReault, $row);
			}
			while ($row);
			mysqli_free_result($result);
			return $arrayReault;
		}
		
		//Добавление рубрики по имени родительской рубрики
		public static function addRubric ($name, $parentName) {
			//Поиск Ид родителя
			$idParent = self::rubricGetIdByName($parentName);
			if ($idParent) {
				//Добавление
				include 'db_connect.php';
				$sql="INSERT INTO {$sqlTableRubricName} (`name`, `parentId`) VALUES ('{$name}','{$idParent}')";
				$result = mysqli_query($sqlLink,$sql) or trigger_error(mysqli_error($sqlLink)." in ". $sql);
				mysqli_close($sqlLink);
				return '1';
			}
			else {

				return '0';
			}
		}
		
		//Возвращает массив названий всех подрубрик целевой рубрики(обход в ширину)
		public static function getRubricByParentRubric($rubric) {
			$currentID = self::rubricGetIdByName($rubric);
			$deck = array($currentID);
			$rubricArray = array($rubric);
			while (count($deck) > 0 && $deck[0]!=0){
				$childs = self::rubricGetChildById(array_shift($deck));
				if ($childs) {
					foreach ($childs as $child) {
						array_push($deck, $child[id]);
						array_push($rubricArray, $child[name]);
					}
				}	
			}
			return $rubricArray;
		}
	}
?>