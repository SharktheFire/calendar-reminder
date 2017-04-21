<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class CalendarReminderTest extends TestCase
{
    /** @var CalendarReminder */
    private $calendarReminder;

    /** @var ReminderFakeRepository */
    private $dummyRepository;

    protected function setUp()
    {
        $this->dummyRepository = new ReminderFakeRepository();
        $this->calendarReminder = new CalendarReminder($this->dummyRepository);
    }

    /**
     * @test
     */
    public function itShouldCreateReminder()
    {
        $date = date('d.m.Y');

        $reminders = $this->calendarReminder->createReminder($date, 'some content');
        $reminders = $this->calendarReminder->createReminder($date, 'some other content');
        $reminders = $this->calendarReminder->createReminder($date, 'some more other content');

        foreach ($this->dummyRepository->reminders as $date => $reminders) {
            foreach ($reminders as $reminder) {
                $this->assertInstanceOf('CalendarReminder\Reminder', $reminder);
                $this->assertEquals($date, $reminder->date());
            }
        }
    }
}