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
     */
    public function createReminder(string $date, string $content)
    {
        $this->reminderRepository->createReminder($date, $content);
    }
}