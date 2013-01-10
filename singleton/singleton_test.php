<?php
	include('singleton.php');

	$s = Singleton::singleton();
	$s->print_increment(); // print 0
	$s->increment(); // 1
	$s->increment(); // 2
	$s->print_increment(); // print 2

	$s = Singleton::singleton(); // reuse singleton
	$s->print_increment(); // print 2
	$s->increment(); // 3
	$s->increment(); // 4
	$s->print_increment(); // print 4
