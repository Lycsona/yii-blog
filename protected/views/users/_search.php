<?php

$form = $this->beginWidget('bs.TbActiveForm', array(
	'id' => 'search-form',
	'type' => 'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'inlineErrors' => false,
	//'htmlOptions' => array('class'=>'well'),
));

//echo $form->errorSummary($model);

?><fieldset><legend><?php echo Yii::t('app', 'Advanced search'); ?></legend><?php

echo $form->textFieldRow($model,'id');
echo $form->textFieldRow($model,'firstname',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'lastname',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'email',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'ip');
echo $form->textFieldRow($model,'city',array('size'=>15, 'maxlength'=>15));
echo $form->textFieldRow($model,'gender');
echo $form->textFieldRow($model,'birthday',array('size'=>20, 'maxlength'=>20));
echo $form->textFieldRow($model,'avatar',array('size'=>50, 'maxlength'=>50));

?></fieldset><?php

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Search'), 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'options'=>array('class'=>'search-toggle')));
echo $form->formRowEnd();

$this->endWidget();