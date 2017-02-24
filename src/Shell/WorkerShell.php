<?php
namespace CriztianiX\Cremilla\Shell;

use Cake\Database\Exception;
use Cake\Datasource\ConnectionManager;
use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;

use Cake\Event\EventManager;
use Cake\Event\Event;

class WorkerShell extends QueuesadillaShell
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
        $workerId = $this->registerWorker();
        $worker = parent::getWorker($engine, $logger);
        $worker->attachListener('Worker.job.success', function ($event) use ($workerId) {
            $event = new Event('Cremilla.Worker.Job.success', $this, [
                'data' => [
                    'workerId' => $workerId
                ]
            ]);
            $this->dispatchEvent($event);
            ConnectionManager::get('default')->disconnect();
        });
        $worker->attachListener('Worker.job.failure', function ($event) use ($workerId) {
            $event = new Event('Cremilla.Worker.Job.failed', $this, [
                'data' => [
                    'workerId' => $workerId
                ]
            ]);
            $this->dispatchEvent($event);
            ConnectionManager::get('default')->disconnect();
        });

        return $worker;
    }

    private function dispatchEvent( \Cake\Event\Event $event)
    {
        $eventManager = EventManager::instance();
        return $eventManager->dispatch($event);
    }

    /**
     * Register worker in database
     *
     */
    private function registerWorker()
    {
        $workersTable = TableRegistry::get('Cremilla.CakephpCremillaWorkers', [
            'className' => 'CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable'
        ]);

        $worker = $workersTable->newEntity([
            "pid" => getmypid(),
            "hostname" => gethostname(),
            'queue' => $this->params['queue']
        ]);

        if (!$workersTable->save($worker)) {
            throw new Exception("Cannot save worker stat to database");
        }

        return $worker->id;
    }
}
