<?php
namespace CriztianiX\Cremilla\Shell;

use Josegonzalez\CakeQueuesadilla\Shell\QueuesadillaShell;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;

// Remove from here
use Cake\Mailer\Email;

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
        foreach($workers as $worker) {
            $isAlive = CremillaWorker::isAlive($worker->pid);

            if(!$isAlive) {
                echo "Handle worker died";
                // Remove from here
                $email = new Email();
                $email->transport("cremilla");
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
