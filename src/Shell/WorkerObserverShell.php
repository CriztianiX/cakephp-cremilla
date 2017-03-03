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
                $deadWorkers[] = $worker;
            }else{
                $aliveWorkers[] = $worker->id;
            }
        }

        if(!empty($aliveWorkers)) {
            $event = new Event('Cremilla.Worker.alive', $this, [
                'data' => [
                    'aliveWorkers' => $aliveWorkers
                ]
            ]);
            $this->dispatchEvent($event);
        }

        if(!empty($deadWorkers)) {
            if($this->shouldNotifyWorkersDead(count($aliveWorkers)))  {
                $event = new Event('Cremilla.Worker.dead', $this, [
                    'data' => [
                        'deadWorkers' => $deadWorkers
                    ]
                ]);
                $this->dispatchEvent($event);
            }
        }
    }

    /**
     * Retrieves workers list
     *
     */
    private function getWorkers()
    {
        $repo = TableRegistry::get('CriztianiX/Cremilla.CakephpCremillaWorkers');
        return $repo->find()->where(["notified" => false]);  
    }

    protected function shouldNotifyWorkersDead($aliveWorkers)
    {
        $notifyDead = Configure::read("Cremilla.Workers.notify_dead");
        $lessThan = Configure::read("Cremilla.Workers.notify_less_than");

        if($notifyDead && $lessThan > $aliveWorkers) {
            return true;
        }

        return false;
    }

    protected function dispatchEvent($event)
    {
        $eventManager = EventManager::instance();
        return $eventManager->dispatch($event);
    }
}
