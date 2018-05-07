<?php
	require_once 'models/Authors.php';
	
	class author {
		public function all() {
			echo(Authors::getAuthorsAll());
		}
		
	}
?>