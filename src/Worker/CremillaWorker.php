<?php
namespace CriztianiX\Cremilla\Worker;

class CremillaWorker
{
    /**
     * Check if worker pid is alive
     * @param $pid
     * @return bool
     */
    public static function isAlive($pid)
    {
        $pid = posix_getpgid($pid);
        return ($pid ? true : false);
    }
}