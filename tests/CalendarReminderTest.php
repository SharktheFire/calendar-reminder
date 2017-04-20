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
        $reminderRepository = new ReminderFakeRepository();

        $date = date('d.m.Y');

        $reminderArr = [];

        $reminderArr[] = $reminderRepository->createReminder($date, 'some content');
        $reminderArr[] = $reminderRepository->createReminder($date, 'some other content');
        $reminderArr[] = $reminderRepository->createReminder($date, 'some more other content');
        $reminderArr[] = $reminderRepository->createReminder('12.12.2012', 'some content');
        $reminderArr[] = $reminderRepository->createReminder('12.12.2012', 'some other content');
        $reminderArr[] = $reminderRepository->createReminder('12.12.2012', 'some more other content');

        $reminders = $this->calendarReminder->addReminders($reminderArr);

        $this->assertEquals('some content', $reminders[$date][0]);
        $this->assertEquals('some other content', $reminders[$date][1]);
        $this->assertEquals('some more other content', $reminders[$date][2]);
        $this->assertEquals(2, count($reminders));
    }
}