<?php 

namespace Grocer\Converters;

class IngredientListConverter {

	protected $ingredientString;

	public function __construct($ingredientString)
	{

		$this->ingredientString = $ingredientString;
	}

	public function convertedList()
	{
		$separatedItems = $this->separateItems($this->ingredientString);

		$items = [];

		foreach ($separatedItems as $itemString)
		{
			$items[] = $this->convertItemStringToIngredientWithMeasurement($itemString);
		}

		return $items;
	}

	private $measurementWords = [
		'cup',
		'cups',
		'can',
		'cans',
		'teaspoon',
		'teaspoons',
		'tablespoon',
		'tablespoons',
		'package',
		'packages',
		'packet',
		'packets',
		'envelope',
		'envelopes',
		'box',
		'boxes',
		'pinch',
		'pinches',
		'dash',
		'dashes',
		'pound',
		'pounds',
		'lb',
		'lbs',
		'oz',
		'ounces'
	];

	private function separateItems($itemsText)
	{
		return preg_split("/\n|\r/", $itemsText);
	}

	private function convertItemStringToIngredientWithMeasurement($item)
	{

		$measurements = implode('|', $this->measurementWords);

		$measurementPattern = '/(.+) ('.$measurements.') (.+)/';

		$success = preg_match($measurementPattern, $item, $array);

		if ( ! $success)
		{
			$array = explode(' ', $item);

			$ingredient['amount'] = $array[0];
			$ingredient['name'] = trim(str_replace(',', '', $array[1]));
			$ingredient['measurement'] = '';

			return $ingredient;

		}

		array_shift($array);

		//Check to see what kind of array we're going to return

		$withWeight = preg_match('/(.+) (\(([^\)]+)\))/', $array[0], $amountAndWeight);

		if ($withWeight)
		{
			$ingredient['amount'] = $amountAndWeight[1];
			$ingredient['weight'] = $amountAndWeight[2];
			$ingredient['measurement'] = $array[1];
			$ingredient['name'] = trim($array[2]);

			return $ingredient;
		}

			$ingredient['amount'] = $array[0];
			$ingredient['measurement'] = $array[1];
			$ingredient['name'] = trim($array[2]);

			return $ingredient;
	}

}