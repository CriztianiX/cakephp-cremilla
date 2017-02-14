<?php
namespace CriztianiX\Cremilla\Log\Engine;

use Cake\ORM\TableRegistry;
use Cake\Log\Engine\BaseLog;

class CremillaLog extends BaseLog
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

    public function log($level, $message, array $context = [])
    {
        $return = $this->Logs->log($level, $message, $context);
        return $return;
    }
}