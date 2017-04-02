<?php 

namespace CalendarReminder\Calendar;

use PHPUnit\Framework\TestCase;

use CalendarReminder\ConstantCollection;

class CalendarTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldHaveMonthAndYearsUpCurrentYear()
    {
        $calendar = new Calendar();

        $monthArray = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'Mai',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];
        $currentYear = date('Y');
        $yearArray = [];

        for ($i=$currentYear; $i < ConstantCollection::MAX_YEARS_GIVEN ; $i++) {
            $yearArray[] = $i;
        }

        $this->assertEquals($monthArray, $calendar->months());
        $this->assertEquals($yearArray, $calendar->years());
    }

    public function itShouldHaveCorrectDaysPerMonth()
    {

    }
}