<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CommissionAdmits Model
 *
 * @method \App\Model\Entity\CommissionAdmit get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommissionAdmit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CommissionAdmit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommissionAdmit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommissionAdmit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommissionAdmit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommissionAdmit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommissionAdmitsTable extends Table
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

        $this->setTable('commission_admits');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->dateTime('modifed')
            ->requirePresence('modifed', 'create')
            ->notEmpty('modifed');

        return $validator;
    }
}
