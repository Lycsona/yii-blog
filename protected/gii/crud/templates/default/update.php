<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php

$nameColumn = $this->guessNameColumn($this->tableSchema->columns);

$label = $this->pluralize($this->class2name($this->modelClass, true));

echo "<?php\n"; ?>

$this->pageTitle = Yii::t('app', 'Edit');

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>') => array('index'),
	$model-><?php echo $nameColumn; ?> => array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),
	$this->pageTitle,
);

// delete confirmation

Yii::app()->clientScript->registerScript('confirm#delete',
	'$("a.confirm").on("click",function(){return confirm("' . Yii::t('app', 'You are sure?') . '");});');

$this->beginWidget('bs.TbPanel', array(
	'heading' => $this->pageTitle
));

?><div class="page-actions"><?php echo "<?php\n"; ?>

	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'New'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Delete'), 'url'=>array('delete', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'icon'=>'trash', 'linkOptions'=>array('class'=>'confirm')),
		),
	));

	?><div class="clearfix"></div>
</div>
<?php echo '<?php'; ?> $this->renderPartial('_form', array('model'=>$model)); ?>
<?php echo '<?php'; ?> $this->endWidget(); ?>