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
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-theme.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-material-design.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/ripples.min.css');
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');

    //    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-2.1.4.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/material.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ripples.min.js', CClientScript::POS_END);

    Yii::app()->clientScript->registerScript('preLoadPicture',
        ' function readURL(input) {
         if (input.files && input.files[0]) {
          var reader = new FileReader();
         reader.onload = function (e) {
         $("#picture").attr("src", e.target.result); };
          reader.readAsDataURL(input.files[0]); }
          }
         $("#Club_logo").change(function(){ readURL(this);
         }); ');

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
        <div class="col-md-8 col-md-offset-2 jumbotron">

            <legend class="text-center">Новая статья</legend>

            <?php echo CHtml::form('', 'post', array('enctype' => 'multipart/form-data')); ?>
            <?php echo CHtml::errorSummary($model) ?>

            <div class="col-md-12 form-group">
                <?php echo CHtml::activeLabel($model, 'Title : '); ?>
                <?php echo CHtml::activeTextField($model, 'title',
                    array(
                        'class' => 'form-control',
                        'placeholder' => ' ',
                    )); ?>
            </div>

            <div class="col-md-12 form-group">
                <?php echo CHtml::activeLabel($model, 'Description : '); ?>
                <?php echo CHtml::activeTextField($model, 'description',
                    array(
                        'class' => 'form-control',
                        'placeholder' => ' ',
                    )); ?>
            </div>

            <div class="col-md-12 form-group">
                <?php echo CHtml::activeLabel($model, 'Article : '); ?>
                <?php echo CHtml::activeTextArea($model, 'aticle',
                    array(
                        'class' => 'form-control',
                        'placeholder' => '  ',
                        'rows' => 6, 'cols' => 50
                    )); ?>
            </div>

            <div class="col-md-12 form-group  ">
                <?php echo CHtml::activeLabel($model, 'Add image : '); ?>
                <?php echo CHtml::activeFileField($model, 'imj',
                    array(
                        'class' => 'form-control',
                        'id' => 'Club_logo',
                    )); ?>
                <div>
                    <img id="picture" style="width:200px; height: 150px;"
                         src="<?php echo Yii::app()->baseUrl ?>/images/no_photo.gif"/>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-8 ">

                    <?php echo CHtml::submitButton('Добавить', array(
                        'submit' => array('articles/index'),
                        'class' => 'btn btn-raised btn-warning ',
                    )); ?>
                </div>
            </div>

            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>
<!--CONTENT END-->
</body>
</html>