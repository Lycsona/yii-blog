<h1>Log Route Generator</h1>
<p>This generator helps you to quickly generate the skeleton code for a new routing class.</p>
<?php $form=$this->beginWidget('CCodeForm', array('model'=>$model)); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Component')); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'className'); ?>
        <?php echo $form->textField($model,'className',array('size'=>65)); ?>
        <div class="tooltip">
            LogRoute class name must only contain word characters.
        </div>
        <?php echo $form->error($model,'className'); ?>
    </div>

	<div class="row sticky">
		<?php echo $form->labelEx($model,'baseClass'); ?>
		<?php echo $form->textField($model,'baseClass',array('size'=>65)); ?>
		<div class="tooltip">
			This is the class that the new cache class will extend from.
			Please make sure the class exists and can be autoloaded.
		</div>
		<?php echo $form->error($model,'baseClass'); ?>
	</div>
<?php $this->endWidget(); ?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Info')); ?>
<div style="padding:5px;font-size:80%;">
A log route object retrieves log messages from a logger and sends it somewhere, such as files, emails. The messages being retrieved may be filtered first before being sent to the destination. The filters include log level filter and log category filter.
<br/><br/>You can find a list of public log routing classes here:
<ul style="margin-top:8px">
<li><a href="http://www.yiiframework.com/doc/api/" target="_blank">Yii Class Reference</a></li>
<li><a href="http://www.yiiframework.com/extensions/?cat=8" target="_blank">Yii Extension Repository</a></li>
</ul>
</div>
<?php $this->endWidget(); ?>
<?php
$tabParameters = array();
foreach($this->clips as $key=>$clip)
    $tabParameters['tab'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
?>

<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
<?php $this->endWidget(); ?>