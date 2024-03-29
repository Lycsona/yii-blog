﻿<?php
/**
 * @package gii
 */
class ValidatorCode extends CCodeModel
{
    public $className;
    public $baseClass='CValidator';
    public $scriptPath='application.validators';

    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('className', 'required'),
            array('className', 'match', 'pattern'=>'/^\w+$/'),
			array('baseClass', 'match', 'pattern'=>'/^\w+$/', 'message'=>'{attribute} should only contain word characters.'),
			array('baseClass', 'sticky'),
            array('scriptPath', 'validateScriptPath'),
            array('scriptPath', 'sticky'),
        ));
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'baseClass'=>'Base Class',
            'className'=>'Validator Class Name',
            'scriptPath'=>'Script Path',
        ));
    }

	public function validateScriptPath($attribute,$params)
	{
		if($this->hasErrors('scriptPath'))
			return;
		if(Yii::getPathOfAlias($this->scriptPath)===false)
			$this->addError('scriptPath','Script Path must be a valid path alias.');
	}

    public function prepare()
    {
        $path=Yii::getPathOfAlias($this->scriptPath).'/' . ucfirst($this->className) . 'Validator.php';
        $code=$this->render($this->templatepath.'/validator.php');
        $this->files[]=new CCodeFile($path, $code);
    }

    public function prepare2()
    {
        $path=Yii::getPathOfAlias('application.validator.' . $this->className) . 'Validator.php';
        $code=$this->render($this->templatepath.'/validator.php');
        $this->files[]=new CCodeFile($path, $code);
    }
}
