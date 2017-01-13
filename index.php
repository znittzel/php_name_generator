<?php 
	include 'NameGenerator.php';

	$generator = new NameGenerator();
	$names = $generator->generateNames(100);

	foreach ($names as $name)
		echo $name->getString().'<br/>';
?>