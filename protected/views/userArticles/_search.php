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
echo $form->textFieldRow($model,'user_id');
echo $form->textFieldRow($model,'article_id');

?></fieldset><?php

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Search'), 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'options'=>array('class'=>'search-toggle')));
echo $form->formRowEnd();

$this->endWidget();