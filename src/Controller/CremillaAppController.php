<?php
namespace CriztianiX\Cremilla\Controller;

use App\Controller\AppController;

class CremillaAppController extends AppController
{
    public function initialize()
    {
        //parent::initialize();
        $this->loadComponent('Paginator');
    }
}