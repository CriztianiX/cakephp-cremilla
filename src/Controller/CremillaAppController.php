<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;
use Cake\View\HelperRegistry;

class CremillaAppController extends AppController
{
    public $helpers = [
        "CriztianiX/Cremilla.CremillaWorker"
    ];
    public function initialize()
    {
        //parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
    }
}