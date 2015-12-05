<?php
$this->pageTitle = CHtml::encode($model->id);

$this->breadcrumbs = array(
	Yii::t('app', 'Users') => array('index'),
	$model->id,
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
		'firstname',
		'lastname',
		'email',
		'password',
		'ip',
		array(
			'name' => 'created_add',
			'type' => 'datetime',
			'value' => strtotime($model->created_add),
		),
		'city',
		'gender',
		'birthday',
		'avatar',
	)
)); 

$this->endWidget();
?>