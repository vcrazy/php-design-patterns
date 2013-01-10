<?php
	class Singleton
	{
		private static $instance;
		private $increment = 0;

		public function __construct() // default constructor
		{
			
		}

		public static function singleton() // singleton constructor
		{
			if(!isset(self::$instance))
			{
				$class = __CLASS__;
				self::$instance = new $class;
			}

			return self::$instance;
		}

		public function __clone()
		{
			trigger_error('Clone is not allowed.', E_USER_ERROR);
		}

		public function __wakeup()
		{
			trigger_error('Unserializing is not allowed.', E_USER_ERROR);
		}

		public function increment()
		{
			$this->increment++;
		}

		public function print_increment()
		{
			echo $this->increment;
		}
	}
