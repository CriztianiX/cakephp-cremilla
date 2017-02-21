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
                // Remove from here
                $email = new Email();
                $email->transport("cremilla")
                    ->from('postmaster@xxx.com', 'XXXX')
                    ->addHeaders([
                        "subject" => "Workers died found",
                    ])
                    ->template('CriztianiX\Cremilla.wokers_status')
                    ->emailFormat('text')
                    ->send();
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
