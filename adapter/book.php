<?php
	class Book
	{
		private $author;
		private $title;

		public function __construct($author_in, $title_in)
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
	}
 