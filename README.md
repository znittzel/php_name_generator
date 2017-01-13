# PhpNameGenerator
A small random name generator. Generates name based on givin minimum and maximum lenghts. These are not "real" names, just randomly selected characters creating a word. Perfect when creating a name for an application.

```php
<?php
    //################ Example of usage ###############//
    
    // Include the php file
    include 'NameGenerator.php';

    // Init generator
    $generator = new NameGenerator();

    // Get givin number of random names
    $names = $generator->generateNames(100);

    // Iterate through the array of names
    foreach ($names as $name)
        echo $name->getString().'<br/>';
?>
```
