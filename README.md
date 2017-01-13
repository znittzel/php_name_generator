# PhpNameGenerator
A small random name generator. Generates names based on givin minimum and maximum lenghts. These are not "real" names, just randomly selected characters creating a word. Perfect when creating a name for an application.

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

Change minimum and maximum lenghts

```php
<?php
    // OPTION 1
    // When initializing generator object
    $generator = new NameGenerator(1, 100); // Will create random names which's between 1 and 100 chars

    // OPTION 2
    // When generator already's been initialized
    $generator->setLenght(1, 100);
?>
```
