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
	'id' => 'aticles-form',
	'type' => 'horizontal',
	'enableAjaxValidation' => false,
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo $form->errorSummary($model);

?><fieldset><?php

echo $form->textFieldRow($model,'title',array('size'=>50, 'maxlength'=>50));
echo $form->textAreaRow($model,'aticle',array('class'=>'form-control', 'rows'=>6, 'cols'=>50));
echo $form->textAreaRow($model,'description',array('class'=>'form-control', 'rows'=>6, 'cols'=>50));
echo $form->textFieldRow($model,'created_at');
echo $form->textFieldRow($model,'imj',array('size'=>50, 'maxlength'=>50));

?></fieldset><?php

echo $form->formRowBegin();
echo '<div class="help-block">' . Yii::t('app', 'Filds with a <span class="required">*</span> &mdash; are required.') . '</div>';
echo $form->formRowEnd();

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>$formSubmit, 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'url'=>$formReturn));
echo $form->formRowEnd();

$this->endWidget();