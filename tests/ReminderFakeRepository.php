<?php

namespace CalendarReminder;

class ReminderFakeRepository implements ReminderRepository
{
    /** @var Reminder[] */
    public $reminders = [];

    /** @var Report */
    public $newReport;

    /** @var bool */
    public $saveMethodCalled = false;

    /**
     * @param string $date
     * @param string $content
     * @return Reminder
     */
    public function createReminder(string $date, string $content): Reminder
    {
        $reminder = new Reminder($date, $content);
        $this->save($reminder);
        return $reminder;
    }

    /**
     * @param Reminder $reminder
     */
    public function save(Reminder $reminder)
    {
        $this->reminders[$reminder->date()][] = $reminder;
        $this->saveMethodCalled = true;
    }
}