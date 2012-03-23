<?php

class Functions2
{
	protected $prime_goal = 3;
	protected $functions;

	public $range;
	public $exist = array(146, 284, 871);

	public function __construct()
	{
		include('functions.php');

		$this->range = range(20, 1000, 37);
		$this->functions = new Functions();
	}

	public function find_3_prime()
	{
		$prime_for_now = 0;

		foreach($this->range as $number)
		{
			if($this->functions->is_prime($number))
			{
				if($prime_for_now < $this->prime_goal - 1) // 0, 1, 2, Print
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

	public function check_exists()
	{
		$intersect = array_intersect($this->exist, $this->range);

		$result = array();

		foreach($this->exist as $number)
		{
			$result[] = 'The number ' . $number . ' ' . (in_array($number, $intersect) ? 'exists' : 'does not exist') . ' in the array';
		}

		return $result;
	}
}
