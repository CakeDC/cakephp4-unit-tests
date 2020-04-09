<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tournaments Model
 *
 * @property \Cake\ORM\Association\HasMany $Games
 * @property \Cake\ORM\Association\HasMany $TournamentMemberships
 *
 * @method \App\Model\Entity\Tournament get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tournament newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tournament[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tournament|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TournamentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tournaments');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Games', [
            'foreignKey' => 'tournament_id',
        ]);
        $this->hasMany('TournamentMemberships', [
            'foreignKey' => 'tournament_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): \Cake\Validation\Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->allowEmptyString('name');

        $validator
            ->dateTime('expiration_date')
            ->allowEmptyDateTime('expiration_date');

        return $validator;
    }

    public function findIndex(Query $query, $options): Query
    {
        $userId = $options['userId'] ?? null;
        if (!$userId) {
            throw new \OutOfBoundsException('Missing userId');
        }

        return $query
            ->contain(['TournamentMemberships' => function (Query $q) use ($userId) {
                return $q
                    ->where(['user_id' => $userId]);
            }]);
    }

    public function findStats(Query $query, $options): Query
    {
        $slug = $options['slug'] ?? null;
        if (!$slug) {
            throw new \OutOfBoundsException('Missing slug');
        }

        return $query
            ->select([
                'Tournaments.name',
                'total_games' => $query->func()->count('DISTINCT Games.id'),
                'total_users' => $query->func()->count('DISTINCT Users.id'),
            ])
            ->leftJoinWith('Games.Users')
            ->group('Tournaments.id')
            // only return rows if there is a matching slug
            ->where(['slug' => $slug]);
    }
}
