<?php 

namespace CalendarReminder\Calendar;

use PHPUnit\Framework\TestCase;

class CalenderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldHaveMonthAndYear()
    {
        $calendar = new Calendar();
        $this->assertEquals($monthArray, $calendar->months());
        $this->assertEquals($yearArray, $calendar->years());
    }
}