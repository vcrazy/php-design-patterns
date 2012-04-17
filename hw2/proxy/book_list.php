<?php
	include_once('book.php');

	class Book_list
	{
		private $books = array();
		private $count = 0;

		public function get_count()
		{
			return $this->count;
		}

		private function set_count($count)
		{
			$this->count = $count;
		}

		public function get_book($number)
		{
			if((is_numeric($number)) && ($number <= $this->get_count()))
			{
				return $this->books[$number];
			}
			else
			{
				return NULL;
			}
		}

		public function add_book(Book $book_in)
		{
			$this->set_count($this->get_count() + 1);
			$this->books[$this->get_count()] = $book_in;

			return $this->get_count();
		}

		public function remove_book(Book $book_in)
		{
			$counter = 0;

			while(++$counter <= $this->get_count())
			{
				if($book_in->get_author_title() == $this->books[$counter]->get_author_title())
				{
					for($x = $counter; $x < $this->get_count(); $x++)
					{
						$this->books[$x] = $this->books[$x + 1];
					}

					$this->set_count($this->get_count() - 1);
				}
			}

			return $this->get_count();
		}
	}
