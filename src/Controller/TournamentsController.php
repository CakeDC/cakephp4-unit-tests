<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\MethodNotAllowedException;

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
        $tournaments = $this->Tournaments->find('index', ['userId' => $this->Authentication->getIdentityData('id')]);
        $this->set(compact('tournaments'));
    }

    public function join($tournamentId)
    {
        $this->request->allowMethod(['post', 'put']);
        if (!$this->request->is('ajax')) {
            throw new MethodNotAllowedException();
        }
        $tournament = $this->Tournaments->get($tournamentId);
        $tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
        $tournament['tournament_memberships'][0]['user_id'] = $this->Authentication->getIdentityData('id');
        $this->Tournaments->save($tournament);
        $this->set(compact('tournament'));
        $this->render('/Element/Tournaments/join');
    }

    public function stats($slug)
    {
        $stats = $this->Tournaments->find('stats', compact('slug'))->firstOrFail();
        $this->set(compact('stats'));
    }
}
