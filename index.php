<?php 
	include 'NameGenerator.php';

	$generator = new NameGenerator(3, 5);
	$names = $generator->generateNames(100);

	foreach ($names as $name)
		echo $name->getString().'<br/>';
?>