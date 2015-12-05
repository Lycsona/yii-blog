﻿<h1>Behavior Generator</h1>
<p>This generator helps you to quickly generate the skeleton code for a new behavior class.</p>
<?php $form=$this->beginWidget('CCodeForm', array('model'=>$model)); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Component')); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'className'); ?>
        <?php echo $form->textField($model,'className',array('size'=>65)); ?>
        <div class="tooltip">
            Behavior class name must only contain word characters.
        </div>
        <?php echo $form->error($model,'className'); ?>
    </div>

	<div class="row sticky">
		<?php echo $form->labelEx($model,'baseClass'); ?>
		<?php echo $form->textField($model,'baseClass',array('size'=>65)); ?>
		<div class="tooltip">
			This is the class that the new widget class will extend from.
			Please make sure the class exists and can be autoloaded.
		</div>
		<?php echo $form->error($model,'baseClass'); ?>
	</div>
	<div class="row sticky">
		<?php echo $form->labelEx($model,'scriptPath'); ?>
		<?php echo $form->textField($model,'scriptPath', array('size'=>65)); ?>
		<div class="tooltip">
			This refers to the directory that the new view script file should be generated under.
			It should be specified in the form of a path alias, for example, <code>application.controller</code>,
			<code>mymodule.views</code>.
		</div>
		<?php echo $form->error($model,'scriptPath'); ?>
	</div>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Info')); ?>
<div style="padding:5px;font-size:80%;">
Derive your behavior classes from:
<ul style="margin-top:8px">
<li>CBehavior</li>
<li>CModelBehavior</li>
<li>CActiveRecordBehavior</li>
</ul>
There are different code templates for these classes.
</div>
<?php $this->endWidget(); ?>
<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>
<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
<?php $this->endWidget(); ?>