<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?><?php echo "<?php

if(\$model->isNewRecord)
{
	\$formSubmit = Yii::t('app', 'Create');
	\$formReturn = array('index');
}
else
{
	\$formSubmit = Yii::t('app', 'Save');
	\$formReturn = array('view', 'id'=>\$model->id);
}

\$form = \$this->beginWidget('bs.TbActiveForm', array(
	'id' => '".$this->class2id($this->modelClass)."-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo \$form->errorSummary(\$model);

?><fieldset><?php\n\n";

foreach($this->tableSchema->columns as $column)
{
	if($column->isPrimaryKey)
		continue;
	echo 'echo ' . $this->generateActiveField($this->modelClass, $column) . ";\n";
}

echo "\n?></fieldset><?php\n";

?>

echo $form->formRowBegin();
echo '<div class="help-block">' . Yii::t('app', 'Filds with a <span class="required">*</span> &mdash; are required.') . '</div>';
echo $form->formRowEnd();

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>$formSubmit, 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'url'=>$formReturn));
echo $form->formRowEnd();

$this->endWidget();