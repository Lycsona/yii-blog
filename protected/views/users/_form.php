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
	'id' => 'users-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo $form->errorSummary($model);

?><fieldset><?php

echo $form->textFieldRow($model,'firstname',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'lastname',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'email',array('size'=>20, 'maxlength'=>20));
echo $form->passwordFieldRow($model,'password',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'ip');
echo $form->textFieldRow($model,'created_add');
echo $form->textFieldRow($model,'city',array('size'=>15, 'maxlength'=>15));
echo $form->textFieldRow($model,'gender');
echo $form->textFieldRow($model,'birthday',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'avatar',array('size'=>50, 'maxlength'=>50));

?></fieldset><?php

echo $form->formRowBegin();
echo '<div class="help-block">' . Yii::t('app', 'Filds with a <span class="required">*</span> &mdash; are required.') . '</div>';
echo $form->formRowEnd();

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>$formSubmit, 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'url'=>$formReturn));
echo $form->formRowEnd();

$this->endWidget();