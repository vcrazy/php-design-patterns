<?php
	include_once('book.php');

	class Adapter
	{
		private $book;

		public function __construct(Book $book_in)
		{
			$this->book = $book_in;
		}

		public function get_author_title()
		{
			return $this->book->get_title() . ' by ' . $this->book->get_author();
		}
	}
