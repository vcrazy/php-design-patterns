<?php
	include_once('book.php');
	include_once('book_list.php');

	class Proxy
	{
		private $list = NULL; 

		public function get_count()
		{
			if($this->list === NULL)
			{
				$this->make_list();
			}

			return $this->list->get_count();
		}

		public function add_book($book)
		{
			if($this->list === NULL)
			{
				$this->make_list();
			}

			return $this->list->add_book($book);
		}

		public function get_book($number)
		{
			if($this->list === NULL)
			{
				$this->make_list();
			}

			return $this->list->get_book($number);
		}

		public function remove_book($book)
		{
			if($this->list === NULL)
			{
				$this->make_list();
			}

			return $this->list->remove_book($book);
		}

		public function make_list()
		{
			$this->list = new Book_list();
		}
	}
