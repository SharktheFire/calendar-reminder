<?php

namespace CalendarReminder;

class Reminder
{
    /** @var string */
    private $date;

    /** @var string */
    private $content;

    /**
     * @param string $date
     * @param string $content
     */
    public function __construct(string $date, string $content)
    {
        $this->date = $date;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function date()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }
}