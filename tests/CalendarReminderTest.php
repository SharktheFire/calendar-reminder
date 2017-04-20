<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class CalendarReminderTest extends TestCase
{
    /** @var CalendarReminder */
    private $calendarReminder;

    protected function setUp()
    {
        $this->calendarReminder = new CalendarReminder();
    }

    /**
     * @test
     */
    public function itShouldAddReminders()
    {
        $date = date('d.m.y');
        $content = 'some content';
        $reminder = $this->calendarReminder->addReminder($date, $content);

        $this->assertInternalType('array', $reminder[$date]);
    }
}