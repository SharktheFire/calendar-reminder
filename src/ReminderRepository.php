<?php

namespace CalendarReminder;

interface ReminderRepository
{
    /**
     * @param string $date
     * @param string $content
     * @return Reminder
     */
    public function createReminder(string $date, string $content): Reminder;

    /**
     * @param Reminder $reminder
     */
    public function save(Reminder $reminder);
}