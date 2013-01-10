<?php
	include_once('book.php');
	include_once('adapter.php');

	$book = new Book('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');

	$adapter = new Adapter($book);

	echo 'Author and Title: ' . $adapter->get_author_title();
