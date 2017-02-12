<?php
namespace CriztianiX\Cremilla\Shell;

use Cake\Datasource\ConnectionManager;
use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use Cake\Log\Log;

class CremillaShell extends QueuesadillaShell
{
    /**
     * Override main() to handle action
     * Starts a Queuesadilla worker
     *
     * @return void
     */
    public function main()
    {
        $logger = Log::engine($this->params['logger']);
        $engine = $this->getEngine($logger);
        $worker = $this->getWorker($engine, $logger);
        $this->registerPid();
        $worker->work();
    }

    /**
     * Retrieves a queue worker
     *
     * @param \josegonzalez\Queuesadilla\Engine\Base $engine engine to run
     * @param \Psr\Log\LoggerInterface $logger logger
     * @return \josegonzalez\Queuesadilla\Worker\Base
     */
    public function getWorker($engine, $logger)
    {
        $worker = parent::getWorker($engine, $logger);
        $worker->attachListener('Worker.job.success', function ($event) {
            ConnectionManager::get('default')->disconnect();
        });
        $worker->attachListener('Worker.job.failure', function ($event) {
            ConnectionManager::get('default')->disconnect();
        });

        return $worker;
    }

    /**
     * Register PID for current worker
     * @return void
     * 
     */
    private function registerPid()
    {
        /**
         * ToDo
         * Remove from here
         */
        $dirPids = TMP . 'cremilla' . DS . 'pids';
        if(!is_dir($dirPids)) {
            mkdir($dirPids, 0777, true);
        }

        $pid = getmypid();
        $pidfile = $dirPids . DS . $pid . ".pid";
        file_put_contents($pidfile, $pid);
    }
}
