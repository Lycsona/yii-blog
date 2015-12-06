<?php

$this->pageTitle = Yii::t('app', 'Edit');

$this->breadcrumbs = array(
	Yii::t('app', 'Aticles') => array('index'),
	$model->title => array('view', 'id'=>$model->id),
	$this->pageTitle,
);

// delete confirmation

Yii::app()->clientScript->registerScript('confirm#delete',
	'$("a.confirm").on("click",function(){return confirm("' . Yii::t('app', 'You are sure?') . '");});');

$this->beginWidget('bs.TbPanel', array(
	'heading' => $this->pageTitle
));

?><div class="page-actions"><?php

	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'New'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Delete'), 'url'=>array('delete', 'id'=>$model->id), 'icon'=>'trash', 'linkOptions'=>array('class'=>'confirm')),
		),
	));

	?><div class="clearfix"></div>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>