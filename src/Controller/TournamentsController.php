<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tournanents Controller
 *
 * @property \App\Model\Table\TournanentsTable $Tournanents
 *
 * @method \App\Model\Entity\Tournanent[] paginate($object = null, array $settings = [])
 */
class TournamentsController extends AppController
{
    public function index()
    {
        //display tournaments, and status
        $tournaments = $this->Tournaments->find('index', ['userId' => $this->Auth->user('id')]);
        $this->set(compact('tournaments'));
    }
}
