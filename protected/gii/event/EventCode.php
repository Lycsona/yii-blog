<?php
/**
 * @package gii
 */
class EventCode extends CCodeModel
{
    public $className;
    public $baseClass='CEvent';

    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('className,baseClass', 'required'),
            array('className', 'match', 'pattern'=>'/^\w+$/'),
			array('baseClass', 'match', 'pattern'=>'/^\w+$/', 'message'=>'{attribute} should only contain word characters.'),
			array('baseClass', 'sticky'),
        ));
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'baseClass'=>'Base Class',
            'className'=>'Event Class Name',
        ));
    }

    public function prepare()
    {
        $path=Yii::getPathOfAlias('application.components.events.' . ucfirst($this->className)) . 'Event.php';
        $code=$this->render($this->templatepath.'/event.php');
        $this->files[]=new CCodeFile($path, $code);
    }
}
