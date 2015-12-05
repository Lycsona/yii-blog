<h1>Action Generator</h1>
<p>This generator helps you to quickly generate the skeleton code for a new action class.</p>
<p style="border:1px solid #CCCCFF;padding:5px;font-size:80%;">
CAction provides a way to divide a complex controller into
smaller actions in separate class files. (<a href="http://www.yiiframework.com/doc/guide/basics.controller" target="_blank">more...</a>)
</p>

<?php $form=$this->beginWidget('CCodeForm', array('model'=>$model)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'className'); ?>
        <?php echo $form->textField($model,'className',array('size'=>65)); ?>
        <div class="tooltip">
            Action class name must only contain word characters.
        </div>
        <?php echo $form->error($model,'className'); ?>
    </div>

	<div class="row sticky">
		<?php echo $form->labelEx($model,'baseClass'); ?>
		<?php echo $form->textField($model,'baseClass',array('size'=>65)); ?>
		<div class="tooltip">
			This is the class that the new action class will extend from.
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