<?php

namespace CalendarReminder;

class ReminderFileRepository implements ReminderRepository
{
    /** @avr string */
    private $remindersPath;

    public function __construct(string $remindersPath)
    {
        $this->remindersPath = $remindersPath;
    }

   /**
     * @param string $date
     * @param string $content
     */
    public function createReminder(string $date, string $content)
    {
        $reminder = new Reminder($date, $content);
        $this->save($reminder);
    }

    /**
     * @param Reminder $reminder
     */
    public function save(Reminder $reminder)
    {
        $this->ensureRemindersPath();
        $this->ensureDatePath($reminder->date());
        $filename = $this->filename($reminder);
        file_put_contents($filename, serialize($reminder));
    }

    /**
     * @return string
     */
    public function remindersPath()
    {
        return $this->remindersPath;
    }

    /**
     * @param Reminder $reminder
     * @return string
     */
    private function filename(Reminder $reminder): string
    {
        return $filename = $this->remindersPath . '/' . $reminder->date() . '/' . $reminder->content();
    }

    /**
     * @throws ReminderFileRepositoryException
     */
    private function ensureRemindersPath()
    {
        if (!file_exists($this->remindersPath)) {
            if (!mkdir($this->remindersPath)) {
                throw new ReminderFileRepositoryException("Could not create directory: $this->remindersPath");
            }
        }
    }

    /**
     * @param string $date
     * @throws ReminderFileRepositoryException
     */
    private function ensureDatePath(string $date)
    {
        $datePath = $this->remindersPath . '/' . $date;
        if (!file_exists($datePath)) {
            if (!mkdir($datePath)) {
                throw new ReminderFileRepositoryException("Could not create directory: $datePath");
            }
        }
    }
}