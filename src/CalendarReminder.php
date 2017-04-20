<?php

namespace CalendarReminder;

class CalendarReminder
{
    /** @var array */
    private $reminders = [];

    /**
     * @param array $reminders
     * @return array
     */
    public function addReminders(array $reminders): array
    {

        foreach ($reminders as $reminder) {

            $date = $reminder->date();

            if (!array_key_exists($date, $this->reminders)) {
                $this->reminders[$date] = [
                    $reminder->content()
                ];
            } else {
                $this->reminders[$date][] = $reminder->content();
            }
        }

        return $this->reminders;
    }
}