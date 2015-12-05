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

$this->pageTitle = CHtml::encode($model-><?php echo $nameColumn; ?>);

$this->breadcrumbs = array(
	Yii::t('app', '<?php echo $label; ?>') => array('index'),
	$model-><?php echo $nameColumn; ?>,
);

// delete confirmation

Yii::app()->clientScript->registerScript('confirm#delete', 'jQuery("a.delete").click(function(){ return confirm("' .
	Yii::t('app', 'Are you sure?') .
'"); });');

?><div class="page-actions"><?php echo "<?php"; ?>

	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'Create'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Edit'), 'url'=>array('update', 'id'=>$model->id), 'icon'=>'pencil'),
			array('label'=>Yii::t('app', 'Delete'), 'url'=>array('delete', 'id'=>$model->id), 'icon'=>'trash', 'linkOptions'=>array('class'=>'delete')),
			array('label'=>Yii::t('app', 'Back'), 'url'=>array('index'), 'icon'=>'chevron-left'),
		),
	));

	?><div class="clearfix"></div>
</div><?php echo "<?php"; ?>

$this->widget('bs.TbDetailView', array(
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
)); 
