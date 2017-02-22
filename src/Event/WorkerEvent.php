<?php
namespace CriztianiX\Cremilla\Event;

use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;

class WorkerEvent implements EventListenerInterface
{
    public function implementedEvents()
    {
        return [
            'Cremilla.Worker.dead' => 'sendNotificationWorkerDead',
        ];
    }

    public function sendNotificationWorkerDead($event, $data)
    {
        $email = new Email();
        $email->transport("cremilla")
            ->from(getenv("EMAIL_FROM_DOMAIN"), getenv("EMAIL_FROM_NAME"))
            ->to(getenv("EMAIL_TO"))
            ->subject("Cremilla alert, Workers dead")
            ->template('CriztianiX/Cremilla.wokers_status')
            ->emailFormat('text')
            ->viewVars($data)
            ->send();
    }
}