<?php
namespace CriztianiX\Cremilla\View\Helper;

use Cake\View\Helper;
use CriztianiX\Cremilla\Worker\CremillaWorker;

class CremillaWorkerHelper extends Helper
{
    public function isAlive($pid)
    {
        $isAlive = CremillaWorker::isAlive($pid);
        return ( $isAlive ? true : false);
    }
}