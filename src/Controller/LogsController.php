<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
class LogsController extends AppController
{
    public $helpers = [ 'PlumSearch.Search' ];

    public $paginate = [
        'limit' => 25,
        'order' => [
            'CakephpCremillaLog.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        //parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('PlumSearch.Filter', [
            'parameters' => [
                ['name' => 'type', 'className' => 'Input'],
            ]
        ]);
    }

    public function index()
    {
        $repo = TableRegistry::get('CriztianiX/Cremilla.CakephpCremillaLogs');
        $this->set('cakephpCremillaLogs', $this->Paginator->paginate($this->Filter->prg($repo)));
        $this->viewBuilder()->setLayout('default');
    }

    public function view($id = null)
    {

    }
}
