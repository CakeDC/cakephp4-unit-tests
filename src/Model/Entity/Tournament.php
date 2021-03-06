<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Tournament Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $expiration_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Game[] $games
 * @property \App\Model\Entity\TournamentMembership[] $tournament_memberships
 */
class Tournament extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setName($name)
    {
        $this['slug'] = Text::slug(strtolower($name));
        return $name;
    }
}
