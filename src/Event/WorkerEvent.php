<?php
namespace CriztianiX\Cremilla\Event;

use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class WorkerEvent implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Cremilla.Worker.alive' => 'regiterTimestampAlive',
            'Cremilla.Worker.dead' => 'sendNotificationWorkerDead',
            'Cremilla.Worker.Job.failed' => 'incrementFailedJob',
            'Cremilla.Worker.Job.success' => 'incrementSuccessJob',
        ];
    }

    public function regiterTimestampAlive($event, $data)
    {
        return $this->getWorkersTable()->updateAll(
            [ 'observed_at' => date('Y-m-d H:i:s')],
            [ 'id IN' => $data["aliveWorkers"] ]
        ); 
    }

    public function regiterWorkersNotified($ids)
    {
        return $this->getWorkersTable()->updateAll(
            [ 'notified' => true],
            [ 'id IN' => $ids ]
        ); 
    }

    public function incrementFailedJob($event, $data)
    {
        $workersTable = $this->getWorkersTable();
        $worker = $workersTable->get($data["workerId"]);
        $worker->jobs_failed = $worker->jobs_failed + 1;

        return $workersTable->save($worker);
    }

    public function incrementSuccessJob($event, $data)
    {
        $workersTable = $this->getWorkersTable();
        $worker = $workersTable->get($data["workerId"]);
        $worker->jobs_success = $worker->jobs_success + 1;

        return $workersTable->save($worker);
    }

    public function sendNotificationWorkerDead($event, $data)
    {
        $ids = array_map(function($worker) {
            return $worker->id;
        }, $data["deadWorkers"] );

        $email = new Email();
        $email->transport("cremilla")
            ->from(getenv("EMAIL_FROM_DOMAIN"), getenv("EMAIL_FROM_NAME"))
            ->to(getenv("EMAIL_TO"))
            ->subject("Cremilla alert, Workers dead")
            ->template('CriztianiX/Cremilla.wokers_status')
            ->emailFormat('text')
            ->viewVars($data)
            ->send();
        $this->regiterWorkersNotified($ids);
    }

    private function getWorkersTable()
    {
        return TableRegistry::get('Cremilla.CakephpCremillaWorkers', [
            'className' => 'CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable'
        ]);
    }
}