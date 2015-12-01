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
<body class=" bg-warning">

<nav class="navbar navbar-default navbar-static-top " role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="collapse navbar-collapse bg-warning " id="bs-example-navbar-collapse-1">

        <ul class="nav nav-tabs  nav-justified ">
            <li><a href="#"><span class="glyphicon glyphicon-home"> </span> Главная</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user "> </span> Профиль</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-search"> </span> Поиск</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-wrench"> </span> Настройки</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-new-window"> </span> Выйти</a></li>
        </ul>

    </div>

    <div class="container-fluid bg-dange ">
        <div class="row">
            <div class="page-header ">
                <h1 class="text-center text-info"> Чемодан дневников
                    <small> твой ежедневник лежит в самом уютном месте</small>
                </h1>
            </div>
        </div>

        <div class="row text-info">
            <div class="jumbotron ">
                <h1 class="text-right "> Добро пожаловать ! </h1>

                <p class="text-right text-danger"> Добавь красок сегодняшнего дня... </p>

                <p class="text-right "><a class="btn btn-primary btn-lg " role="button">Создать новый дневник</a>
            </div>

            <img src="/images/222.jpg" class="img-responsive" alt="Responsive image">

        </div>
    </div>

    <form class="form-inline text-center" role="form">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Запомнить меня
            </label>
        </div>
        <button class="btn btn-primary " type="submit">Войти</button>
    </form>
    <br>
</nav>

<div class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.
    </p>

    <p class="text-center">
        <a href="#">Back to top</a>
    </p>
</div>
</body>
</html>