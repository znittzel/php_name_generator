<?php 
	include 'NameGenerator.php';

	$generator = new NameGenerator(2, 3);
	$names = $generator->generateNames(100);

	foreach ($names as $name)
		echo $name->getString().'<br/>';
?>