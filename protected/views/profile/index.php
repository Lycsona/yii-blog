<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blog</title>
    <!-- Bootstrap -->
    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <?php
    //    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.1.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/moment-with-locales.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap-datetimepicker.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/material.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ripples.min.js', CClientScript::POS_END);


    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-datetimepicker.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-theme.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-material-design.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/ripples.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');

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
            <a class="navbar-brand " href="<?php echo Yii::app()->baseUrl ?>/home/index">Главная</a>
        </div>
        <div class="navbar-collapse collapse navbar-warning-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo Yii::app()->baseUrl ?>/profile/index">Профиль</a></li>
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
                <li><a href="<?php echo Yii::app()->baseUrl ?>/profile/exit">Выйти</a></li>
            </ul>

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
    <div class=" container col-md-offset-1 ">
        <div class="col-md-9  jumbotron">

            <h1>Твои статьи</h1>
            <?php foreach ($models as $userArticle) {
                $value = Articles::model()->findByPk($userArticle['article_id']);
                ?>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center " style="color: #000020"><?php echo $value->title; ?> </h3>
                    </div>
                    <div class="panel-body">
                        <p><i> <?php echo $value->description; ?> </i></p>

                        <img src="<?php echo Yii::app()->baseUrl ?>/images/<?php echo $value->imj ?> " width='785'
                             height='350' alt="imj">

                        <p> <?php echo $value->aticle; ?></p>

                        <a href="<?php echo Yii::app()->baseUrl ?>/articles/update/<?php echo $value->id ?>"
                           class="btn btn-raised btn-warning">Редактировать</a>
                        <a href="<?php echo Yii::app()->baseUrl ?>/articles/delete/<?php echo $value->id ?>"
                           class="btn btn-raised">Удалить</a>
                    </div>
                </div>
            <?php } ?>

        </div>


        <div class=" container col-md-offset-10 ">
            <div class="col-md-3  jumbotron">

                <div class="col-md-12 btn-group-vertical ">
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/<?php echo $userAvatar ?> " width='220'
                         height='150' alt="imj">

                </div>

                <h1 class=" text-center">Меню </h1>

                <div class="col-md-12 btn-group-vertical text-center">
                    <a href="<?php echo Yii::app()->baseUrl ?>/articles/index" class="btn btn-raised ">Добавить
                        статью</a>
                </div>
                <br>

                <div class="col-md-12 btn-group-vertical ">

                    <a href="<?php echo Yii::app()->baseUrl ?>/users/delete/<?php echo $userId ?>"
                       class="btn btn-raised ">Удалить профиль
                    </a>
                </div>

                <form class="navbar-form navbar-left" action="
                <?php echo Yii::app()->baseUrl ?>/index.php/profile/search" method="POST">
                    <div class="col-md-9 form-group">
                        <input type="text" class="form-control col-md-8" name="title" placeholder="Поиск статьи">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-fab btn-fab-mini">
                            <i class="material-icons">send</i>
                        </button>
                    </div>

                </form>
                <!--_______________________календарь__________________________________________-->

                <!-- Инициализация виджета "Bootstrap datetimepicker" -->
                <div class="col-md-12  form-group">
                    <!-- Элемент HTML с id равным datetimepicker1 -->
                    <div class="input-group date" id="datetimepicker1">

                        <label class=" col-md-offset-2">Календарь
                            <input type="hidden" class="form-control" placeholder="календарь"/></label>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar "></span>
                        </span>
                    </div>
                </div>

                <!-- Инициализация виджета "Bootstrap datetimepicker" -->
                <script type="text/javascript">
                    $(function () {
                        //Идентификатор элемента HTML (например: #datetimepicker1), для которого необходимо инициализировать виджет "Bootstrap datetimepicker"
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
                <!--_______________________календарь__________________________________________-->

            </div>
        </div>

    </div>
</div>
<!--CONTENT END-->
</body>
</html>