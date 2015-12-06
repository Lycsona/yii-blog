<?php
$this->pageTitle = CHtml::encode($model->title);

$this->breadcrumbs = array(
	Yii::t('app', 'Articles') => array('index'),
	$model->title,
);

// delete confirmation

Yii::app()->clientScript->registerScript('confirm#delete', 'jQuery("a.delete").click(function(){ return confirm("' .
	Yii::t('app', 'You are sure?') .
'"); });');

$this->beginWidget('bs.TbPanel', array(
	'heading' => $this->pageTitle
));

?><div class="page-actions"><?php
	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'New'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Edit'), 'url'=>array('update', 'id'=>$model->id), 'icon'=>'pencil'),
			array('label'=>Yii::t('app', 'Delete'), 'url'=>array('delete', 'id'=>$model->id), 'icon'=>'trash', 'linkOptions'=>array('class'=>'delete')),
			array('label'=>Yii::t('app', 'Back'), 'url'=>array('index'), 'icon'=>'chevron-left'),
		),
	));

	?><div class="clearfix"></div>
</div><?php
$this->widget('bs.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'title',
		'aticle',
		'description',
		array(
			'name' => 'created_at',
			'type' => 'datetime',
			'value' => strtotime($model->created_at),
		),
		'imj',
	)
)); 

$this->endWidget();
?>