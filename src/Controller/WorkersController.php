<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;

class WorkersController extends AppController
{
    public function initialize()
    {
        //parent::initialize();
    }

    public function index()
    {
        $workersTable = TableRegistry::get('Cremilla.CakephpCremillaWorkers', [
            'className' => 'CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable'
        ]);

        $workers = $workersTable->find('all');
        $this->set(compact('workers'));
    }
}
