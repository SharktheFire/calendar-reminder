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
        $date = date('d.m.Y');
        $reminders = [];

        $reminders[$date][] = new Reminder($date, 'some content');
        $reminders[$date][] = new Reminder($date, 'some other content');
        $reminders[$date][] = new Reminder($date, 'some more other content');

        $this->dummyRepository = \Mockery::mock('CalendarReminder\ReminderRepository');
        $this->dummyRepository->shouldReceive('createReminder')->andReturn($reminders[$date][0]);
        $this->dummyRepository->shouldReceive('save');
        $this->dummyRepository->shouldReceive('findRemindersPerDate')->andReturn($reminders);

        $this->calendarReminder = new CalendarReminder($this->dummyRepository);
    }

    protected function tearDown()
    {
        \Mockery::close();
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

        foreach ($reminders as $reminder) {
            $this->assertTrue($this->dummyRepository->shouldReceive('createReminder')->times(3));
        }

        foreach ($this->dummyRepository->findRemindersPerDate() as $date => $reminders) {
            foreach ($reminders as $reminder) {
                $this->assertInstanceOf('CalendarReminder\Reminder', $reminder);
                $this->assertInstanceOf('CalendarReminder\Reminder', $reminder);
                $this->assertEquals($date, $reminder->date());
            }
        }
    }
}