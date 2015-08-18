<?php

use Carbon\Carbon;
use Grocer\Models\WeeklyList;

class WeeklyListTest extends TestCase
{

	public function testFetchesTheCurrentWeek()
	{
		
		$thisWeek = WeeklyList::currentWeek();

		//Check to make sure this week starts at the previous Sunday
		$lastSunday =  Carbon::now()->startOfWeek()->subDays(1);
		$this->assertEquals($thisWeek->starts_at->format('m-d-Y'), $lastSunday->format('m-d-Y'));

		$stillthisWeek = WeeklyList::currentWeek();

		//It should be the exact same week object, fetched from the DB
		$this->assertEquals($thisWeek, $stillthisWeek);

		$this->seeInDatabase('weekly_lists', ['starts_at' => $lastSunday->format('Y-m-d')]);


	}
}