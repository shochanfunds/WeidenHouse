<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;

/**
 * Managers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\Manager get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manager newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Manager[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manager|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manager findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManagersTable extends Table
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

        $this->setTable('managers');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Statuses', [
            'foreignKey' => 'statuses_id',
            'joinType' => 'INNER'
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
             ->requirePresence('username', 'create')
             ->notEmpty('username');

         $validator
             ->requirePresence('password', 'create')
             ->notEmpty('password');

         $validator
             ->email('email')
             ->requirePresence('email', 'create')
             ->notEmpty('email');

         $validator
             ->requirePresence('physicalwidth', 'create')
             ->notEmpty('physicalwidth');

         $validator
             ->requirePresence('physicalheight', 'create')
             ->notEmpty('physicalheight');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['statuses_id'], 'Statuses'));

        return $rules;
    }
    function valiables(){
      $valiables = array(
        'root_dir' => Router::url('/',true),
      );

      return $valiables;
    }
}
