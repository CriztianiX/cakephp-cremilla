<?php
use Cake\Core\Plugin;
use Cake\Log\Log;
use Cake\Mailer\Email;

Log::config('cremilla', [
    'className' => 'CriztianiX\Cremilla\Log\Engine\CremillaLog',
    'levels' => ['notice', 'info', 'debug', 'alert', 'error']
]);

Email::setConfigTransport('cremilla', [
    'className' => 'CriztianiX\Cremilla\Mailer\Transport\MailgunTransport'
]);

Plugin::load('PlumSearch');