<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class ReminderTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldCreateReminder()
    {
        $date = date('d.m.Y');
        $content = 'some content';

        $reminder = new Reminder($date, $content);

        $this->assertEquals($reminder->date(), $date);
        $this->assertEquals($reminder->content(), $content);
    }
}