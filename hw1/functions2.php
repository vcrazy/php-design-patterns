<?php

class Functions2
{
	protected $prime_goal = 3; // nth number
	protected $functions;

	public $exist = array(146, 284, 871); // check for

	public function __construct()
	{
		include('functions.php');

		global $range; // first time I made it with $this->range, but however changed it..
		$range = range(20, 1000, 37);
		$this->functions = new Functions();
	}

	/**
	 * Returns the 3rd prime number
	 * @return int
	 */
	public function find_3_prime()
	{
		global $range;
		$prime_for_now = 0;

		foreach($range as $number)
		{
			if($this->functions->is_prime($number))
			{
				if($prime_for_now < $this->prime_goal - 1) // 0, 1, 2 - Print
				{
					$prime_for_now++;
				}
				else
				{
					return $number;
				}
			}
		}

		return FALSE;
	}

	/**
	 * Checkes whether $this->exist exist in $range
	 * @return string 
	 */
	public function check_exists()
	{
		global $range;

		$intersect = array_intersect($this->exist, $range);

		$result = array();

		foreach($this->exist as $number)
		{
			$result[] = 'The number ' . $number . ' ' . (in_array($number, $intersect) ? 'exists' : 'does not exist') . ' in the array';
		}

		return $result;
	}
}
