<?php

namespace CalendarReminder;

use PHPUnit\Framework\TestCase;

class ReminderFileRepositoryTest extends TestCase
{
    const REMINDERS_ROOT_PATH = 'tests/reminders';

    /** @var ReminderFileRepository */
    public $reminderRepository;

    protected function setUp()
    {
        $this->reminderRepository = new ReminderFileRepository(self::REMINDERS_ROOT_PATH);
    }

    protected function tearDown()
    {
        $this->deleteRecursive(self::REMINDERS_ROOT_PATH);
    }

    /**
     * @test
     */
    public function itShouldHaveRepositoryRootPath()
    {
        $this->assertEquals(self::REMINDERS_ROOT_PATH, $this->reminderRepository->remindersPath());
    }


    /**
     * @test
     */
    public function itShouldCreateReminderAndSave()
    {
        $date = date('d.m.Y');
        $content = 'some content';
        $this->reminderRepository->createReminder($date, $content);
        $reminderFileName = sprintf('%s/%s/%s'
            , self::REMINDERS_ROOT_PATH
            , $date
            , $content
        );
        $foundReminder = unserialize(file_get_contents($reminderFileName));
        $this->assertEquals($foundReminder->date(), $date);
        $this->assertEquals($foundReminder->content(), $content);
    }

    private function deleteRecursive($input)
    {
        if (is_file($input)) {
            unlink($input);
            return;
        }
        if (is_dir($input)) {
            foreach (scandir($input) as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $file = join('/', [$input, $file]);
                if (is_file($file)) {
                    unlink($file);
                    continue;
                }
                $this->deleteRecursive($file);
                rmdir($file);
            }
        }
    }
}