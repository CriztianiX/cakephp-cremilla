<?php
namespace CriztianiX\Cremilla\Task;

class DummyTask
{
    /**
     * Dummy successfully task/job
     * @return bool
     *
     */
    public function work()
    {
        return true;
    }

    /**
     * Dummy exception task/job
     * @throws \Exception
     * 
     */
    public function failed()
    {
        throw new \Exception("Failed executing Job");
    }
}