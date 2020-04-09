<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TournamentMemberships Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tournaments
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TournamentMembership get($primaryKey, $options = [])
 * @method \App\Model\Entity\TournamentMembership newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TournamentMembership[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TournamentMembership|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TournamentMembership patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentMembership[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentMembership findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TournamentMembershipsTable extends Table
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

        $this->setTable('tournament_memberships');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournament_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nick', 'create')
            ->notEmpty('nick');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): \Cake\ORM\RulesChecker
    {
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        $rules->add($rules->isUnique(['tournament_id', 'user_id'], __('Users can only be registered once')));
        $rules->add($rules->isUnique(['tournament_id', 'nick'], __('Nick is already taken')), null, [
            'errorField' => 'nick',
        ]);

        return $rules;
    }
}
