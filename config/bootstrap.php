<?php
use Cake\Core\Plugin;
use Cake\Log\Log;
use Cake\Mailer\Email;

Log::config('cremilla', [
    'className' => 'CriztianiX\Cremilla\Log\Engine\CremillaLog',
    'levels' => ['notice', 'info', 'debug', 'alert', 'error']
]);

# Configure email transport to send worker's alerts
# Using built-in Mailgun transport
Email::setConfigTransport('cremilla', [
    'className' => 'CriztianiX\Cremilla\Mailer\Transport\MailgunTransport',
    'domain' => getenv("MAILGUN_DOMAIN"),
    'apiKey' => getenv("MAILGUN_API_KEY")
]);

Plugin::load('PlumSearch');