<?php
	//Роут
	$url = explode("/",$_GET['url']);
	require_once 'control/'.$url[0].'.php';
	switch (count($url)) {
		case 2:
			call_user_func(array($url[0], $url[1]));
			break;
		case 3:
			call_user_func(array($url[0], $url[1]),$url[2]);
			break;
		case 4:
			call_user_func(array($url[0], $url[1]),$url[2],$url[3]);
			break;	
	}
?>