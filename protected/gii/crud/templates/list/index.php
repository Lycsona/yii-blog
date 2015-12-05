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

?><div class="page-header">
	<h1><?php echo "<?php"; ?> echo $this->pageTitle; ?></h1>
</div>
<div class="page-actions clearfix"><?php echo "<?php"; ?>

	$this->widget('bootstrap.TbNav', array(
		'type'=>'pills',
		'options' => array('class'=>'pull-right'),
		'items'=>array(
			array('label'=>Yii::t('app', 'Advanced search'), 'url'=>'#', 'icon'=>'search', 'linkOptions'=>array('class'=>'search-toggle')),
		),
	));

?></div><?php echo "<?php"; ?>

echo CHtml::tag('div', array('id'=>'search-form', 'class'=>'search-form', 'style'=>'display:none'),
	$this->renderPartial('_search', array('model'=>$model), true), true);

$this->widget('bootstrap.TbListView', array(
	'id' => '<?php echo $classId; ?>-list',
	'itemView' => '_item',
	'dataProvider' => $dataProvider,
	'sortableAttributes' => $sortableAttributes,
));