<?php

$this->pageTitle = Yii::t('app', 'User Articles');

$this->breadcrumbs = array(
	$this->pageTitle,
);

// search form

Yii::app()->clientScript->registerScript('user-articles#search', "
jQuery('.search-toggle').click(function(){ jQuery('.search-form').toggle(); return false; });
jQuery('.search-form form').submit(function(){
	jQuery.fn.yiiGridView.update('user-articles-grid', { data: jQuery(this).serialize() });
	return false;
});");

$this->beginWidget('bs.TbPanel', array(
	'heading' => $this->pageTitle
));

?><div class="page-actions clearfix"><?php
	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'New'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Advanced search'), 'url'=>'#', 'icon'=>'search', 'linkOptions'=>array('class'=>'search-toggle')),
		),
	));

?></div><?php
echo CHtml::tag('div', array('id'=>'search-form', 'class'=>'search-form', 'style'=>'display:none'),
	$this->renderPartial('_search', array('model'=>$model), true), true);

$this->widget('bs.TbGridView', array(
	'id' => 'user-articles-grid',
	'filter' => $model,
	'dataProvider' => $dataProvider,
	'columns' => array(
		'user_id',
		'article_id',
		array(
			'class' => 'bs.TbButtonColumn',
			'header' => Yii::t('app', 'Actions'),
			'buttons' => array(
				'view' => array('url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data->primaryKey))'),
				'update' => array('url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data->primaryKey))'),
				'delete' => array('url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data->primaryKey))', 'icon'=>'trash'),
			),
		)
	)
));

$this->endWidget();
?>