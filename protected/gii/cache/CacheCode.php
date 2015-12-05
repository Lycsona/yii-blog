<?php
/**
 * @package gii
 */
class CacheCode extends CCodeModel
{
    public $className;
    public $baseClass='CCache';
    public $scriptPath='application.components';

    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('className,baseClass', 'required'),
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
            'className'=>'Cache Class Name',
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
        $path=Yii::getPathOfAlias($this->scriptPath).'/' . ucfirst($this->className) . 'Cache.php';
        $code=$this->render($this->templatepath.'/cache.php');
        $this->files[]=new CCodeFile($path, $code);
    }
}
