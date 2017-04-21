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
        $this->dummyRepository = \Mockery::mock('CalendarReminder\ReminderRepository');
        $this->dummyRepository->shouldReceive('createReminder')->times(1)->withAnyArgs(date('d.m.Y'), 'some content');

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
        $this->calendarReminder->createReminder(date('d.m.Y'), 'some content');
    }
}