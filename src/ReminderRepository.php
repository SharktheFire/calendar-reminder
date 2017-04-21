<?php

namespace CalendarReminder;

interface ReminderRepository
{
    /**
     * @param string $date
     * @param string $content
     */
    public function createReminder(string $date, string $content);

    /**
     * @param Reminder $reminder
     */
    public function save(Reminder $reminder);
}