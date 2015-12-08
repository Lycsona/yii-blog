<?php

if($model->isNewRecord)
{
	$formSubmit = Yii::t('app', 'Create');
	$formReturn = array('index');
}
else
{
	$formSubmit = Yii::t('app', 'Save');
	$formReturn = array('view', 'id'=>$model->id);
}

$form = $this->beginWidget('bs.TbActiveForm', array(
	'id' => 'user-articles-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo $form->errorSummary($model);

?><fieldset><?php

echo $form->textFieldRow($model,'user_id');
echo $form->textFieldRow($model,'article_id');

?></fieldset><?php

echo $form->formRowBegin();
echo '<div class="help-block">' . Yii::t('app', 'Filds with a <span class="required">*</span> &mdash; are required.') . '</div>';
echo $form->formRowEnd();

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>$formSubmit, 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'url'=>$formReturn));
echo $form->formRowEnd();

$this->endWidget();