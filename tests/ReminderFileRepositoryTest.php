<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class ReminderFileRepositoryTest extends TestCase
{
    /** @var ReminderFileRepository */
    public $reminderRepository;

    protected function setUp()
    {
        $this->reminderRepository = new ReminderFileRepository();
    }

    public function itShouldCreateReminderAndSave()
    {

    }
}