<?php
/**
 * @package gii
 */
class LogRouteCode extends CCodeModel
{
    public $className;
    public $baseClass='CLogRoute';

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
            'className'=>'Log Route Class Name',
        ));
    }

    public function prepare()
    {
        $path=Yii::getPathOfAlias('application.logging.' . ucfirst($this->className)) . 'LogRoute.php';
        $code=$this->render($this->templatepath.'/LogRoute.php');
        $this->files[]=new CCodeFile($path, $code);
    }
}
