<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>
	<!-- Bootstrap -->
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-2.1.4.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
	?>
</head>
<body>

<ul class="nav nav-tabs  nav-justified">
	<li class="active"><a href="#">Главная</a></li>
	<li ><a href="#">Профиль</a></li>
	<li><a href="#">Поиск</a></li>
	<li><a href="#">Настройки</a></li>
	<li><a href="#">Выйти</a></li>
</ul>

<div class="page-header">
	<h1> Чемодан личных дневников <small> твой ежедневник лежит в самом уютном месте</small></h1>
</div>

<div class="jumbotron ">
	<h1> Добро пожаловать ! </h1>
	<p> Добавь красок сегодняшнего дня... </p>
	<p><a class="btn btn-primary btn-lg" role="button">Создать новый дневник</a>
		<a class="btn btn-primary btn-lg" role="button">Мой дневник уже здесь</a></p>
</div>

<form class="navbar-form navbar-left" role="search">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Search">
	</div>
	<button type="submit" class="btn btn-default">Искать</button>
</form>
</body>
</html>