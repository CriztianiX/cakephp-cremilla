<?php
namespace CriztianiX\Cremilla\Controller;

use CriztianiX\Cremilla\Controller\CremillaAppController;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;

class WorkersController extends CremillaAppController
{
    public $paginate = [
        'limit' => 25,
        'order' => [
            'CakephpCremillaWorker.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $repo = TableRegistry::get('CriztianiX/Cremilla.CakephpCremillaWorkers');
        $this->set('workers', $this->Paginator->paginate($repo));
        $this->viewBuilder()->setLayout('default');
    }
}
