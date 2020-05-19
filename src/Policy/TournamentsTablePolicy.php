<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Tournament;
use Authorization\IdentityInterface;
use Cake\ORM\Query;

/**
 * Tournament policy
 */
class TournamentsTablePolicy
{
    public function canIndex(IdentityInterface $user, Query $query)
    {
        return true;
    }

    public function scopeIndex(IdentityInterface $user, Query $query)
    {
        return $query->matching('TournamentMemberships', function (Query $q) use ($user) {
            return $q->where(['TournamentMemberships.user_id' => $user->get('id')]);
        });
    }

}
