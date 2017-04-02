<?php 

namespace CalendarReminder\Calendar;

use CalendarReminder\ConstantCollection;

class Calendar
{
    /**
     * @return array
     */
    public function months(): array
    {
        return [
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
    }

    public function years(): array
    {
        $currentYear = (int) date('Y');

        for ($i=$currentYear; $i < ConstantCollection::MAX_YEARS_GIVEN ; $i++) { 
            $years[] = $i;
        }
        return $years;
    }
}