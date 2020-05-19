<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Tournament;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

/**
 * Tournament policy
 */
class TournamentPolicy
{
    public function canAdd(IdentityInterface $user, Tournament $tournament)
    {
        return true;
    }

    public function canInvite(IdentityInterface $user, Tournament $tournament)
    {
        return TableRegistry::getTableLocator()->get('TournamentMemberships')
            ->exists([
                'user_id' => $user->get('id'),
                'tournament_id' => $tournament->get('id'),
            ]);
    }
}
