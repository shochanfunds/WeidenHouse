<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Endclients Model
 *
 * @method \App\Model\Entity\Endclient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Endclient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Endclient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Endclient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endclient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Endclient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Endclient findOrCreate($search, callable $callback = null, $options = [])
 */
class EndclientsTable extends Table
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

        $this->setTable('endclients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects',[
            'joinType' => 'LEFT',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('phone_number', 'create')
            ->allowEmpty('phone_number');

        $validator
            ->requirePresence('address', 'create')
            ->allowEmpty('address');

        return $validator;
    }
}
