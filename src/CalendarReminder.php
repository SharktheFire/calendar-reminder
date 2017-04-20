<?php

namespace CalendarReminder;

class CalendarReminder
{
    /** @var array */
    private $reminders;

    /**
     * @param string $date
     * @param string $content
     * @return array
     */
    public function addReminder(string $date, string $content): array
    {
        return $this->reminders = [
            $date => [
                $content
            ]
        ];
    }
}