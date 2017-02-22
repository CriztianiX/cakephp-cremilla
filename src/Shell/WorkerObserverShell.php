<?php
namespace CriztianiX\Cremilla\Shell;

use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;
use Cake\Event\EventManager;
use Cake\Event\Event;

class WorkerObserverShell extends QueuesadillaShell
{
    /**
     * Override main() to handle action
     * Starts Observer
     *
     * @return void
     */
    public function main()
    {
        $workers = $this->getWorkers();
        $deadWorkers = [];

        foreach($workers as $worker) {
            $isAlive = CremillaWorker::isAlive($worker->pid);
            if(!$isAlive) {
                $deadWorkers[] = $worker->pid;
            }
        }

        if(!empty($deadWorkers)) {
            $eventManager = EventManager::instance();
            $event = new Event('Cremilla.Worker.dead', $this, [
                'data' => [
                    'deadWorkers' => $deadWorkers
                ]
            ]);

            $eventManager->dispatch($event);
        }
    }

    /**
     * Retrieves workers list
     *
     */
    public function getWorkers()
    {
        $repo = TableRegistry::get('CriztianiX/Cremilla.CakephpCremillaWorkers');
        return $repo->find('all');  
    }
}
