<?php

$this->pageTitle = Yii::t('app', 'Create');

$this->breadcrumbs = array(
	Yii::t('app', 'Articles') => array('index'),
	$this->pageTitle,
);

$this->beginWidget('bs.TbPanel', array(
	'heading' => $this->pageTitle
));
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>