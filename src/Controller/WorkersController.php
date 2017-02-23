<?php
namespace CriztianiX\Cremilla\Controller;

use CriztianiX\Cremilla\Controller\CremillaAppController;
use Cake\ORM\TableRegistry;
use CriztianiX\Cremilla\Worker\CremillaWorker;
use CriztianiX\Cremilla\Form\CakephpCremillaWorkersForm;

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

    public function add()
    {
        $cakephpCremillaWorker = new CakephpCremillaWorkersForm();

        if ($this->request->is('post')) {
            if ($cakephpCremillaWorker->execute($this->request->getData())) {
                $this->Flash->success('Worker created successfully.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }

        $this->set(compact('cakephpCremillaWorker'));
    }

    public function stop($pid)
    {
        $this->request->allowMethod(['post', 'delete']);

        if ($this->request->is(['post', 'put'])) {

            if (posix_kill($pid, 15)) {
                $this->Flash->success(__('Your worker has been stopped.'));
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to stop your worker.'));
            return $this->redirect(['action' => 'index']);
        }
    }
}
