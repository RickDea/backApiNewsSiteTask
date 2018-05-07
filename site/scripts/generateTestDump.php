<?php
	include "../config/dbConnectParams.php";
	
	//Рубрики
	$arrayRubrics = array(
		array(
			'name'=>'Общество',
			'parentId'=>0,
		),
		array(
			'name'=>'Наука',
			'parentId'=>1,
		),
		array(
			'name'=>'Политика',
			'parentId'=>1,
		),
		array(
			'name'=>'Произшествия',
			'parentId'=>1,
		),
		array(
			'name'=>'Спорт',
			'parentId'=>1,
		),
		array(
			'name'=>'Физика',
			'parentId'=>2,
		),
		array(
			'name'=>'Космос',
			'parentId'=>2,
		),
		array(
			'name'=>'Биология',
			'parentId'=>2,
		),
		array(
			'name'=>'Выборы',
			'parentId'=>3,
		),
		array(
			'name'=>'Криминал',
			'parentId'=>4,
		),
		array(
			'name'=>'ЧП',
			'parentId'=>4,
		),
		array(
			'name'=>'Футбол',
			'parentId'=>5,
		),
		array(
			'name'=>'Олимпиада',
			'parentId'=>5,
		),
	);
	
	//Авторы
	$arrayAuthors = array(
		array(
			'nickName'=>'Kirya',
			'fullName'=>'Иванов Кирил Кирилович',
			'urlImage'=>'http://s.fishki.net/upload/post/201505/10/1527965/bb0a731fdfa0f8493536e9fa28ea05bf.jpg'
		),
		array(
			'nickName'=>'Albe',
			'fullName'=>'Иванова Альбина Ивановна',
			'urlImage'=>'http://www.pavelin.ru/images/stories/koala/koaly_006.jpg'
		),
		array(
			'nickName'=>'MrFrid',
			'fullName'=>'Васильков Василий Васильевич',
			'urlImage'=>'https://izobrazhenie.net/photo/0-0/6336_390531206.jpg'
		),
		array(
			'nickName'=>'JackHourse',
			'fullName'=>'Абрамова Ольга Витальевна',
			'urlImage'=>'https://i.ytimg.com/vi/R28lU1Ua8J0/maxresdefault.jpg'
		),
		array(
			'nickName'=>'Vergan',
			'fullName'=>'Замятин Андрей Игоревич',
			'urlImage'=>'http://www.catsmob.com/post/2012/02/00314/funny_animals_cm_20120214_00314_039.jpg'
		),
		
	);
	//Новости
	$arrayNews = array(	
		array(
			'header'=>'Заголовок тестовой новости №1',
			'preview'=>'Краткий анонс тестовой новости №1',
			'text'=>'Текс тестовой новости №1',
			'author'=>'MrFrid',
			'rubric'=>'Олимпиада, Футбол',
		),
		array(
			'header'=>'Заголовок тестовой новости №2',
			'preview'=>'Краткий анонс тестовой новости №2',
			'text'=>'Текс тестовой новости №2',
			'author'=>'Kirya',
			'rubric'=>'Криминал, ЧП',
		),
		array(
			'header'=>'Заголовок тестовой новости №3',
			'preview'=>'Краткий анонс тестовой новости №3',
			'text'=>'Текс тестовой новости №3',
			'author'=>'Vergan',
			'rubric'=>'Выборы',
		),
		array(
			'header'=>'Заголовок тестовой новости №4',
			'preview'=>'Краткий анонс тестовой новости №4',
			'text'=>'Текс тестовой новости №4',
			'author'=>'Albe',
			'rubric'=>'Политика,Произшествия,ЧП',
		),
		array(
			'header'=>'Заголовок тестовой новости №5',
			'preview'=>'Краткий анонс тестовой новости №5',
			'text'=>'Текс тестовой новости №5',
			'author'=>'Vergan',
			'rubric'=>'Физика,Космос',
		),
		
	);
	
	//Подключение к БД
	$sqlLink = mysqli_connect($sqlHost, $sqlUser, $sqlPass);
	
	if(!$sqlLink) {
		echo"Connect is failed<br />";
	}
	else{
		echo "Connect to base data successful!<br />";
	}
	
	mysqli_select_db($sqlLink,$sqlNameBd);
	
	//Цикл добавления авторов
	foreach ($arrayAuthors as $author) {
		
		$sql ="INSERT INTO {$sqlTableAuthorName} (`nickName`, `fullName`, `urlImage`) VALUES ('{$author[nickName]}','{$author[fullName]}', '{$author[urlImage]}')";
		
		if (mysqli_query($sqlLink, $sql)){
			echo "Author ($author[nickName]) successful added! <br />";
		}
		else {
			echo"Error adding new author! <br />";
		}
	}
	
	//Цикл добавления новостей
	foreach ($arrayNews as $news) {
		
		$sql = "INSERT INTO {$sqlTableNewsName} (`header`, `preview`, `text`, `author`, `rubric`) VALUES ('{$news[header]}', '{$news[preview]}', '{$news[text]}', '{$news[author]}', '{$news[rubric]}')";
		
		if (mysqli_query($sqlLink, $sql)){
			echo "News ($news[header]) successful added! <br />";
		}
		else {
			echo"Error adding news! <br />";
		}
	}
	
	//Цикл добавления рубрик
	foreach ($arrayRubrics as $rubric) {
		
		$sql = "INSERT INTO {$sqlTableRubricName} (`name`, `parentId`) VALUES ('{$rubric[name]}', '{$rubric[parentId]}')";
		
		if (mysqli_query($sqlLink, $sql)){
			echo "Rubric ($rubric[name]) successful added! <br />";
		}
		else {
			echo"Error adding rubric! <br />";
		}
	}
	
	
	mysqli_close($sqlLink);
	echo "Database connection is closed<br />";
?>