<?php
	require_once 'models/Newss.php';
	
	class news {
		public function author($authorNickName) {
			echo(Newss::getNewsByAuthor($authorNickName));
		}
		public function rubric($rubric) {
			echo(Newss::getNewsByRubric($rubric));
		}
		public function id($id) {
			echo(Newss::getNewsById($id));
		}
		public function rubrics($rubric) {
			echo(Newss::getNewsByParentRubric($rubric));
		}
		public function name($name) {
			echo(Newss::getNewsByName($name));
		}
	}
	
?>