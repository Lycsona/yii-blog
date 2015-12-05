<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */

$label = $this->pluralize($this->class2name($this->modelClass, true));

echo "<?php\n"; ?>

$form = $this->beginWidget('bootstrap.TbActiveForm', array(
	'id' => 'search-form',
	'type' => 'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo $form->errorSummary($model);

<?php echo '?>'; ?><fieldset><legend><?php echo "<?php echo Yii::t('app', 'Advanced search'); ?>"; ?></legend><?php echo "<?php\n\n";

foreach($this->tableSchema->columns as $column)
{
	if(strpos($this->generateInputField($this->modelClass, $column), 'password') !== false
		|| strlen((string)$column->defaultValue)) continue;

	echo 'echo ' . $this->generateActiveField($this->modelClass, $column) . ";\n";
}

echo "\n?></fieldset><?php\n";

?>

echo $form->formRowBegin();
$this->widget('bootstrap.TbButton', array('label'=>Yii::t('app', 'Search'), 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bootstrap.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'options'=>array('class'=>'search-toggle')));
echo $form->formRowEnd();

$this->endWidget();