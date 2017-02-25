<?php
namespace CriztianiX\Cremilla\Shell;

use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;
use Cake\Event\EventManager;
use Cake\Event\Event;
use Cake\Core\Configure;

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
        $aliveWorkers = [];

        foreach($workers as $worker) {
            $isAlive = CremillaWorker::isAlive($worker->pid);
            if(!$isAlive) {
                $deadWorkers[] = $worker->pid;
            }else{
                $aliveWorkers[] = $worker->id;
            }
        }

        if(!empty($aliveWorkers)) {
            $eventManager = EventManager::instance();
            $event = new Event('Cremilla.Worker.alive', $this, [
                'data' => [
                    'aliveWorkers' => $aliveWorkers
                ]
            ]);

            $eventManager->dispatch($event);
        }

        if(!empty($deadWorkers)) {
            if(Configure::read("Cremilla.Workers.notify_dead") === true) {
                $eventManager = EventManager::instance();
                $event = new Event('Cremilla.Worker.dead', $this, [
                    'data' => [
                        'deadWorkers' => $deadWorkers
                    ]
                ]);

                $eventManager->dispatch($event);
            }
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
