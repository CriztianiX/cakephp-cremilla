<?php
namespace CriztianiX\Cremilla\Log\Engine;

use Cake\ORM\TableRegistry;
use Cake\Log\Engine\ConsoleLog;

class CremillaLog extends ConsoleLog
{
    /**
     * Model object placeholder
     *
     * @var \CriztianiX\Cremilla\Model\Table\CakephpCremillaLogsTable
     */
    public $Logs;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->Logs = TableRegistry::get('Cremilla.CakephpCremillaLogs', [
            'className' => 'CriztianiX\Cremilla\Model\Table\CakephpCremillaLogsTable'
        ]);
    }

    public function alert($message, array $context = array())
    {
        return $this->log("alert", $message, $context);
    }

    public function debug($message, array $context = array())
    {
        return parent::log("debug", $message, $context);
    }

    public function error($message, array $context = array())
    {
        return $this->log("alert", $message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        $return = $this->Logs->log($level, $message, $context);
        return $return;
    }
}