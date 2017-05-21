<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Relatedfriends Model
 *
 * @method \App\Model\Entity\Relatedfriend get($primaryKey, $options = [])
 * @method \App\Model\Entity\Relatedfriend newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Relatedfriend[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Relatedfriend|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Relatedfriend patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Relatedfriend[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Relatedfriend findOrCreate($search, callable $callback = null, $options = [])
 */
class RelatedfriendsTable extends Table
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

        $this->setTable('relatedfriends');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('client')
            ->requirePresence('client', 'create')
            ->notEmpty('client');

        $validator
            ->integer('childclient')
            ->requirePresence('childclient', 'create')
            ->notEmpty('childclient');

        return $validator;
    }
}
