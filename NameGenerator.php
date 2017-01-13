<?php

class Name extends ArrayObject {
	public function getString() {
		$name = "";
		foreach ($this->getArrayCopy() as $letter) {
			$name .= $letter->char;
		}

		return $name;
	}
}

class Letter {
	public $char, $isVowel;

	public function __construct($char, $isVowel) {
		$this->char = $char;
		$this->isVowel = $isVowel; 
	}
}

class NameGenerator {
	private $_roules = [
		"minLenght" => 2, 
		"maxLenght" => 40
		];
	private $_vowels, $_consonants, $_minLenght, $_maxLenght, $_numOfVowels, $_numOfConsonants;

	public function __construct($min = 2, $max = 10) {
		// Standard values
		$this->_minLenght = 2;
		$this->_maxLenght = 10;
		$this->_vowels = [
			new Letter("A", 1), 
			new Letter("E", 1), 
			new Letter("I", 1), 
			new Letter("O", 1), 
			new Letter("U", 1), 
			new Letter("Y", 1)
		];
		$this->_consonants = [
			new Letter("B", 0), 
			new Letter("C", 0), 
			new Letter("D", 0), 
			new Letter("F", 0), 
			new Letter("G", 0), 
			new Letter("H", 0), 
			new Letter("J", 0), 
			new Letter("K", 0), 
			new Letter("L", 0), 
			new Letter("M", 0), 
			new Letter("N", 0), 
			new Letter("P", 0), 
			new Letter("Q", 0), 
			new Letter("R", 0), 
			new Letter("S", 0),
			new Letter("T", 0), 
			new Letter("V", 0),
			new Letter("W", 0), 
			new Letter("X", 0), 
			new Letter("Z", 0)
		];

		$this->_numOfVowels = count($this->_vowels);
		$this->_numOfConsonants = count($this->_consonants);
	}

	/**
	 * Sets the min and max lenght of the randomized generated names.
	 */
	public function setLenght($min, $max) {
		$result = true;

		if ($min >= $this->_allowedLenghts["minLenght"] && 
			$min < $this->_allowedLenghts["maxLenght"] &&
			$max <= $this->_allowedLenghts["maxLenght"] &&
			$max > $this->_allowedLenghts["minLenght"]) {
			
			// If is in bound of allowed lenghts, ok
			$this->_minLenght = $min;
			$this->_maxLenght = $max;
		} else {
			$result = false;
		}

		return $result;
	}

	/**
	 * Generates and returns ONE randomized name.
	 */
	public function generateName() {
		$name = new Name();

		$randomLenght = rand($this->_minLenght+1, $this->_maxLenght);
		for ($i = $this->_minLenght; $i <= $randomLenght; $i++) {
			$consonant = $this->_consonants[rand(0, $this->_numOfConsonants-1)];
			$vowel = $this->_vowels[rand(0, $this->_numOfVowels-1)];

			// Only the first time
			if ($i == $this->_minLenght) {
				// Start with vowel or consonant
				if (rand(0,1) == 1)
					$name->append($vowel);
				else 
					$name->append($consonant);
			} else {
				if ($name[count($name)-1]->isVowel) {
					$name->append($consonant);
				} else {
					$name->append($vowel);
				}
			}
		}

		return $name;
	}

	/**
	 * Generates and returns giving number of randomized name as array.
	 */
	public function generateNames($quantity = 2) {
		$names = [];

		for ($i = 0; $i < $quantity; $i++)
			array_push($names, $this->generateName());

		return $names;
	}
}

?>