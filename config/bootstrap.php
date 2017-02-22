<?php
use Cake\Core\Plugin;
use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Event\EventManager;
use CriztianiX\Cremilla\Event\WorkerEvent;

Log::config('cremilla', [
    'className' => 'CriztianiX\Cremilla\Log\Engine\CremillaLog',
    'levels' => ['notice', 'info', 'debug', 'alert', 'error']
]);

# Configure email transport to send worker's alerts
# Using built-in Mailgun transport
Email::configTransport('cremilla', [
    'className' => 'CriztianiX\Cremilla\Mailer\Transport\MailgunTransport',
    'domain' => getenv("MAILGUN_DOMAIN"),
    'apiKey' => getenv("MAILGUN_API_KEY")
]);

/**
 * Attach events Listeners
 */
$eventManager = EventManager::instance();
$eventManager->on(new WorkerEvent());

Plugin::load('PlumSearch');