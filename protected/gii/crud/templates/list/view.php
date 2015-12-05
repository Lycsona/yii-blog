<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php

$nameColumn = $this->guessNameColumn($this->tableSchema->columns);

$label = $this->pluralize($this->class2name($this->modelClass, true));

echo "<?php"; ?>

$this->pageTitle = CHtml::encode($model-><?php echo $nameColumn; ?>)
	. ' - ' . Yii::t('app', '<?php echo $label; ?>');

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>') => array('index'),
	$model-><?php echo $nameColumn; ?>,
);

?><div class="page-header">
	<h1><?php echo "<?php"; ?> echo CHtml::encode($model-><?php echo $nameColumn; ?>); ?></h1>
</div>
<div class="page-actions clearfix"><?php echo "<?php"; ?>

	$this->widget('bootstrap.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'Back'), 'url'=>array('index'), 'icon'=>'chevron-left'),
		),
	));

?></div><?php echo "<?php"; ?>

$this->widget('bootstrap.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
<?php foreach($this->tableSchema->columns as $name=>$column): ?>
		<?php

	$html = "'{$name}',\n";

	switch(strtolower($column->type))
	{
	case 'integer':
		if($column->size == 1)
			$html = "'{$name}:boolean',\n";
		break;
	case 'string':
		switch($column->dbType)
		{
		case 'datetime':
		case 'timestamp':
			$html = "array(
			'name' => '{$name}',
			'type' => 'datetime',
			'value' => strtotime(\$model->{$name}),
		),\n";
			break;
		case 'date':
			$html = "array(
			'name' => '{$name}',
			'type' => 'date',
			'value' => strtotime(\$model->{$name}),
		),\n";
			break;
		case 'time':
			$html = "array(
			'name' => '{$name}',
			'type' => 'time',
			'value' => strtotime(\$model->{$name}),
		),\n";
			break;
		}
		break;
	}

	echo $html;
?>
<?php endforeach; ?>
	)
)); ?>