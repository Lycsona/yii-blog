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
echo $form->textFieldRow($model,'title',array('size'=>50, 'maxlength'=>50));
echo $form->textAreaRow($model,'aticle',array('class'=>'form-control', 'rows'=>6, 'cols'=>50));
echo $form->textAreaRow($model,'description',array('class'=>'form-control', 'rows'=>6, 'cols'=>50));
echo $form->textFieldRow($model,'created_at');
echo $form->textFieldRow($model,'imj',array('size'=>50, 'maxlength'=>50));

?></fieldset><?php

echo $form->formRowBegin();
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Search'), 'type'=>TbButton::TYPE_PRIMARY));
$this->widget('bs.TbButton', array('label'=>Yii::t('app', 'Cancel'), 'options'=>array('class'=>'search-toggle')));
echo $form->formRowEnd();

$this->endWidget();