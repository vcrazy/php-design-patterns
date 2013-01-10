<?php
	class Factory
	{
		public function __construct()
		{
		}

		public static function factory($type)
		{
			if(include_once 'drivers/' . $type . '.php')
			{
				$classname = 'Driver_' . $type;

				return new $classname;
			}
			else
			{
				throw new Exception('Driver not found');
			}
		}
	}
