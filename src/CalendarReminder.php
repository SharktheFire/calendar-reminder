<?php

namespace CalendarReminder;

class CalendarReminder
{
    /**
     * @param ReminderRepository $reminderRepository
     */
    public function __construct(ReminderRepository $reminderRepository)
    {
        $this->reminderRepository = $reminderRepository;
    }

    /**
     * @param string $date
     * @param string $content
     * @return Reminder
     */
    public function createReminder(string $date, string $content): Reminder
    {
        return $this->reminderRepository->createReminder($date, $content);
    }
}