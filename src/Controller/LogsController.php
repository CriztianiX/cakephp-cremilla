<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
class LogsController extends AppController
{
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
    }

    public function index()
    {
        $repo = TableRegistry::get('CriztianiX/Cremilla.CakephpCremillaLogs');
        $this->set('cakephpCremillaLogs', $this->paginate($repo));
        $this->viewBuilder()->setLayout('default');
    }

    public function view($id = null)
    {

    }
}
