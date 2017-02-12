<?php
use Cake\Core\Plugin;
use Cake\Log\Log;

Log::config('cremilla', [
    'className' => 'CriztianiX\Cremilla\Log\Engine\CremillaLog',
    'levels' => ['notice', 'info', 'debug', 'alert', 'error']
]);

Plugin::load('PlumSearch');