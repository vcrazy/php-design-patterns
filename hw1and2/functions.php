<?php

class Functions
{
	protected $min_limit = 0;
	protected $max_limit = 19999;

	public function __construct($number = NULL)
	{
		$this->messages = include('messages.inc.php');

		$this->number = $number;
	}

	/**
	 * Checks whether the $number is number
	 * @param mixed $number
	 * @return void
	 */
	public function process_number()
	{
		if($this->number === NULL)
		{
			return $this->_error_no_number();
		}

		if(!$this->_is_number())
		{
			return $this->_error_nan();
		}

		if(!$this->_in_range())
		{
			return $this->_error_range();
		}

		if($this->is_prime())
		{
			return $this->_success_prime();
		}
		else
		{
			return $this->_error_prime();
		}
	}

	/**
	 * Error with the range
	 * @return string
	 */
	private function _error_range()
	{
		$str  = '<span class="red">';
		$str .= sprintf($this->messages['errors']['range'], $this->min_limit, $this->max_limit);
		$str .= '</span>';

		return $str;
	}

	/**
	 * NAN error
	 * @return string
	 */
	private function _error_nan()
	{
		$str  = '<span class="red">';
		$str .= $this->messages['errors']['nan'];
		$str .= '</span>';

		return $str;
	}

	/**
	 * No number
	 * @return string 
	 */
	private function _error_no_number()
	{
		$str  = '<span class="red">';
		$str .= $this->messages['errors']['no_number'];
		$str .= '</span>';

		return $str;
	}

	/**
	 * Sad but true
	 * @param int $number
	 * @return boolean 
	 */
	private function _is_number()
	{
		$number = (string)$this->number;

		$length = mb_strlen($number, 'utf-8');

		if(!$length)
		{
			return FALSE;
		}

		for($i = 0; $i < $length; $i++)
		{
			$char = mb_substr($number, $i, 1, 'utf-8');

			if(!(!$i && $char == '-') && ($char < '0' || $char > '9'))
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	/**
	 * Checks whether the given number is in the region
	 * @param int $number
	 * @param int $from
	 * @param int $to
	 * @return boolean
	 */
	private function _in_range($from = FALSE, $to = FALSE)
	{
		if($from === FALSE)
		{
			$from = $this->min_limit;
		}

		if($to === FALSE)
		{
			$to = $this->max_limit;
		}

		if($from < $to)
		{
			$from += $to;
			$to = $from - $to;
			$from -= $to;
		}

		return (int)$this->number >= $to && (int)$this->number <= $from;
	}

	/**
	 * Checks whrther the number is prime
	 * @param int $number
	 * @return boolean 
	 */
	public function is_prime($number = NULL)
	{
		if($number === NULL)
		{
			$number = $this->number;
		}
		else
		{
			$number = (int)$number;
		}

		if($number < 2)
		{
			return FALSE;
		}

		if(in_array($number, array(2, 3, 5, 7)))
        {
			return TRUE;
		}

		$number = (string)$number;

		// prime non-numbers end in 0, 2, 4, 5, 6 or 8 no matter how long they are
		if(in_array(substr($number, -1), array(0, 2, 4, 5, 6, 8)))
		{
			return FALSE;
		}
 
		//if the number is divisible by 3 or 7 then it's not prime
		if(!($number % 3) || !($number % 7))
		{
			return FALSE;
		}

        //the primes array holds prime numbers to test if they divide into num 
		$sqrt = sqrt($number);
        $primes = array(2, 3, 5, 7); // first 4

        for($i = 10; $i < $sqrt; $i++)
		{
            $isprime = TRUE;

			// check is it divisible my a prime number - if yes - it is not prime
            foreach($primes AS $prime)
			{
                if(!($i % $prime))
				{ 
                    $isprime = FALSE; 
					break; 
                } 
            }

			// if until now it is a prime - now check is it the next to add in the $primes array
            if($isprime)
			{ 
                if(!($number % $i)) 
                {
					return FALSE; 
				}

				$primes[] = $i; 
            } 
        } 

        return TRUE; 
	}

	private function _success_prime()
	{
		$str  = '<span class="black">';
		$str .= sprintf($this->messages['errors']['prime'], $this->number);
		$str .= '</span>';

		return $str;
	}

	private function _error_prime()
	{
		$str  = '<span class="blue">';
		$str .= sprintf($this->messages['errors']['nprime'], $this->number);
		$str .= '</span>';

		return $str;
	}
}
