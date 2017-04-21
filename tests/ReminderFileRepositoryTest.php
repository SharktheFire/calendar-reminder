<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class ReminderFileRepositoryTest extends TestCase
{
    const REMINDERS_ROOT_PATH = 'tests/reminders';

    /** @var ReminderFileRepository */
    public $reminderRepository;

    protected function setUp()
    {
        $this->reminderRepository = new ReminderFileRepository(self::REMINDERS_ROOT_PATH);
    }

    protected function tearDown()
    {
        $this->deleteRecursive(self::REMINDERS_ROOT_PATH);
    }

    /**
     * @test
     */
    public function itShouldHaveRepositoryRootPath()
    {
        $this->assertEquals(self::REMINDERS_ROOT_PATH, $this->reminderRepository->remindersPath());
    }

    public function itShouldCreateReminderAndSave()
    {

    }
}