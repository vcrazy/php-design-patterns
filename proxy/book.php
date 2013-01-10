<?php
	class Book
	{
		private $author;
		private $title;

		public function __construct($title_in, $author_in)
		{
			$this->author = $author_in;
			$this->title  = $title_in;
		}

		public function get_author()
		{
			return $this->author;
		}

		public function get_title()
		{
			return $this->title;
		}

		public function get_author_title()
		{
			return $this->get_title() . ' by ' . $this->get_author();
		}
	}
