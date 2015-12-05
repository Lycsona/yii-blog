<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-theme.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-material-design.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/ripples.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');

    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-2.1.4.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/material.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ripples.min.js', CClientScript::POS_END);
    ?>
</head>

<body class=" bg-warning">

<!--HEADER START-->
<div class="navbar navbar-warning ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="javascript:void(0)">Главная</a>
        </div>
        <div class="navbar-collapse collapse navbar-warning-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="javascript:void(0)">Профиль</a></li>
                <li class="dropdown">
                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Настройки
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Dropdown header</li>
                        <li><a href="javascript:void(0)">Separated link</a></li>
                        <li><a href="javascript:void(0)">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)">Выйти</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" placeholder="Search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo Yii::app()->baseUrl ?>/registration/index">Зарегистрироваться</a></li>
                <li class="dropdown">
                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--HEADER END-->

<!--CONTENT START-->
<div class="row">
    <div class="container ">
        <div class="col-md-12 jumbotron">

            <h1>Название сайта</h1>

            <p>Описание сайта</p>

            <p class=" text-right">Читать о сайте <a class="btn btn-warning btn-fab"><i
                        class="material-icons ">textsms</i></a></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="container ">
        <div class="col-md-4 col-md-offset-8 jumbotron">
            <form class="form-horizontal" action="<?php echo Yii::app()->baseUrl ?>/controllers/enter">

                <div class="form-group ">

                    <label for="inputEmail" class=" col-md-2 control-label ">Email</label>

                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-md-2 control-label">Password</label>

                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2 ">

                            <p class="text-right">Войти
                                <button type="submit" class="btn btn-warning btn-fab "><i class="material-icons ">
                                        system_update_alt</i></button>
                            </p>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>


<!--CONTENT END-->

<!--FOOTER START-->


<!--FOOTER END-->
</body>
</html>