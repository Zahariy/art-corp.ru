<?php
class Model
{
	protected static $models_folder = "application/models/";
	protected static $models_file_prefix = "Model_";
	protected static $class_folder = "class/";
	
	public static function getModel($model)
	{
		self::includeModelFile($model);
		$class = self::$models_file_prefix.$model;
		if(!class_exists($class))
			throw new ModelClassNotExistsException($class);
		return new $class();
	}
	
	private static function includeModelFile($model)
	{
		$model_file = $model.'.php';
		$model_path = self::$models_folder.self::$models_file_prefix.$model_file;
		if(file_exists($model_path))
			include $model_path;
		else
			throw new ModelFileNotFoundException($model_path);
	}
}
?>