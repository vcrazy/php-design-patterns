<?php
	include_once('proxy.php');
	include_once('book.php');

	$proxyBookList = new Proxy();

	$inBook = new Book('PHP for Cats', 'Larry Truett');

	$proxyBookList->add_book($inBook);

	echo 'book added - count: <br />';
	echo $proxyBookList->get_count();
	echo '<br /><br />';

	echo 'book count: <br />';
	$outBook = $proxyBookList->get_book(1);
	echo $outBook->get_author_title(); 
	echo '<br /><br />';

	$proxyBookList->remove_book($outBook);

	echo 'book removed - count: <br />';
	echo $proxyBookList->get_count();
	echo '<br /><br />';
