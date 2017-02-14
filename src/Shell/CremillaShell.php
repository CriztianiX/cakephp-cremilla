<?php
namespace CriztianiX\Cremilla\Shell;
use Cake\Datasource\ConnectionManager;
use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use CriztianiX\Cremilla\Log\Engine\CremillaLog;

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
        $logger = new CremillaLog();
        $engine = $this->getEngine($logger);
        $worker = $this->getWorker($engine, $logger);
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
}
