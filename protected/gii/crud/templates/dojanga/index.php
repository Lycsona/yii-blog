<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php

$classId = $this->class2id($this->modelClass);

$label = $this->pluralize($this->class2name($this->modelClass, true));

echo "<?php\n"; ?>

$this->pageTitle = Yii::t('app', '<?php echo $label; ?>');

$this->breadcrumbs = array(
	$this->pageTitle,
);

// search form

Yii::app()->clientScript->registerScript('<?php echo $classId; ?>#search', "
jQuery('.search-toggle').click(function(){ jQuery('.search-form').toggle(); return false; });
jQuery('.search-form form').submit(function(){
	jQuery.fn.yiiGridView.update('<?php echo $classId; ?>-grid', { data: jQuery(this).serialize() });
	return false;
});");

?><div class="page-actions clearfix"><?php echo "<?php"; ?>

	$this->widget('bs.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'Create'), 'url'=>array('create'), 'icon'=>'plus'),
			array('label'=>Yii::t('app', 'Advanced search'), 'url'=>'#', 'icon'=>'search', 'linkOptions'=>array('class'=>'search-toggle')),
		),
	));

?></div><?php echo "<?php"; ?>

echo CHtml::tag('div', array('id'=>'search-form', 'class'=>'search-form', 'style'=>'display:none'),
	$this->renderPartial('_search', array('model'=>$model), true), true);

$this->widget('bs.TbGridView', array(
	'id' => '<?php echo $classId; ?>-grid',
	'filter' => $model,
	'dataProvider' => $dataProvider,
	'columns' => array(
<?php foreach($this->tableSchema->columns as $name=>$column): ?>
<?php
	if($column->isPrimaryKey)
		continue;

	if(!strlen((string)$column->defaultValue))
		$html = "\t\t'{$name}',\n";
	else
	{
		$html = "\t\tarray(
			'name' => '{$name}',
			'filter' => false,
		),\n";
	}

	switch($column->type)
	{
	case 'integer':
		if($column->size == 1)
		{
			$html = "\t\tarray(
			'name' => '{$name}',
			'type' => 'boolean',
			'headerHtmlOptions' => array(
				'width' => 70,
			),
			'filter' => false,
		),\n";
			}
			break;
	case 'string':
		switch($column->dbType)
		{
		case 'text':
		case 'longtext':
		case 'mediumtext':
			$html = '';
			break;
		case 'datetime':
		case 'timestamp':
			$html = "\t\tarray(
			'name' => '{$name}',
			'type' => 'datetime',
			'value' => 'strtotime(\$data->{$name})',
			'headerHtmlOptions' => array(
				'width' => 130,
			),
			'filter' => false,
		),\n";
			break;
		case 'date':
			$html = "\t\tarray(
			'name' => '{$name}',
			'type' => 'date',
			'value' => 'strtotime(\$data->{$name})',
			'headerHtmlOptions' => array(
				'width' => 70,
			),
			'filter' => false,
		),\n";
			break;
		case 'time':
			$html = "\t\tarray(
			'name' => '{$name}',
			'type' => 'time',
			'value' => strtotime(\$data->{$name}),
			'headerHtmlOptions' => array(
				'width' => 70,
			),
			'filter' => false,
		),\n";
			break;
		}
		break;
	}

	if(empty($html))
		continue;

	echo $html;

endforeach; ?>
		array(
			'class' => 'bs.TbButtonColumn',
			'header' => Yii::t('app', 'Action'),
			'buttons' => array(
				'view' => array('url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data->primaryKey))'),
				'update' => array('url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data->primaryKey))'),
				'delete' => array('url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data->primaryKey))', 'icon'=>'trash'),
			),
		)
	)
));
