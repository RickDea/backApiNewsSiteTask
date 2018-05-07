<?php
	require_once 'models/Rubrics.php';
	
	class rubric {
		
		public function add($name, $parentName) {
			echo Rubrics::addRubric($name, $parentName);
		}
		
	}
?>