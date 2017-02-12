<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;
use CriztianiX\Cremilla\Worker\CremillaWorker;

use Cake\Filesystem\Folder;


class WorkersController extends AppController
{
    public function initialize()
    {
        //parent::initialize();
    }

    public function index()
    {
        // ToDo
        // Only for test
        $dirPids = TMP . 'cremilla' . DS . 'pids';
        $dir = new Folder($dirPids, true, 0777);

        $pids = array_map(function($pid) {
            $x = (int) str_replace(".pid", "", $pid);
            return [ "pid" => $x, "status" => CremillaWorker::isAlive($x) ];
        }, $dir->find('.*\.pid'));

        debug($pids);

        die;

    }
}
