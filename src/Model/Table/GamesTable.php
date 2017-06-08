<?php
namespace App\Model\Table;

use App\Model\Entity\Game;
use App\Model\Entity\Move;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Games Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Tournaments
 * @property \Cake\ORM\Association\HasMany $Moves
 *
 * @method \App\Model\Entity\Game get($primaryKey, $options = [])
 * @method \App\Model\Entity\Game newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Game[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Game|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Game[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Game findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('games');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tournaments', [
            'foreignKey' => 'tournament_id'
        ]);
        $this->hasMany('Moves', [
            'foreignKey' => 'game_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('best_of')
            ->requirePresence('best_of', 'create')
            ->greaterThan('best_of', 0, __('Best of must be > 0'));

        $validator
            ->boolean('is_player_winner')
            ->allowEmpty('is_player_winner');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['tournament_id'], 'Tournaments'));

        return $rules;
    }

    public function current($userId)
    {
        return $this->find('owner', compact('userId'))
            ->where(['is_player_winner IS' => null])
            ->contain('Moves')
            ->first();
    }

    public function findOwner(Query $query, array $options) : Query
    {
        $userId = $options['userId'] ?? null;
        if (!$userId) {
            throw new \OutOfBoundsException('Option userId is required');
        }
        return $query
            ->where(['user_id' => $userId]);
    }

    public function checkFinished($gameId)
    {
        $game = $this->get($gameId, [
            'contain' => ['Moves'],
        ]);
        if ($game['is_player_winner'] !== null) {
            return null;
        }
        $isPlayerWinner = $this->_isPlayerWinner($game);
        if ($isPlayerWinner !== null) {
            $game['is_player_winner'] = $isPlayerWinner;
            return $this->save($game);
        }
    }

    protected function _isPlayerWinner(Game $game)
    {
        list($playerWins, $computerWins) = $this->_countWins($game);
        if ($game['best_of'] === 1) {
            return $playerWins === 1;
        } else {
            $threshold = (int)($game['best_of'] / 2) + 1;
            if ($playerWins >= $threshold) {
                return true;
            }
            if ($computerWins >= $threshold) {
                return false;
            }
        }
    }

    protected function _countWins(Game $game)
    {
        $wins = collection($game->get('moves'))
            ->countBy(function (Move $move) {
                if ($move['is_player_winner'] === true) {
                    return 'player';
                };
                if ($move['is_player_winner'] === false) {
                    return 'computer';
                };
            })->toArray();
        if (empty($wins)) {
            //only ties
            return null;
        }

        return [$wins['player'] ?? 0, $wins['computer'] ?? 0];
    }
}
