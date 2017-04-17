<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;

/**
 * Clients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Paidstatuses
 * @property \Cake\ORM\Association\BelongsTo $Managers
 * @property \Cake\ORM\Association\BelongsTo $Howtopays
 * @property \Cake\ORM\Association\BelongsTo $Projects
 * @property \Cake\ORM\Association\BelongsTo $CommissionAdmits
 * @property \Cake\ORM\Association\BelongsTo $Sexes
 * @property \Cake\ORM\Association\BelongsTo $PayReasons
 * @property \Cake\ORM\Association\BelongsTo $Endclients
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Paidstatuses', [
            'foreignKey' => 'paidstatuses_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Managers', [
            'foreignKey' => 'managers_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Howtopays', [
            'foreignKey' => 'howtopays_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'projects_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CommissionAdmits', [
            'foreignKey' => 'commission_admits_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sexes', [
            'foreignKey' => 'sexes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PayReasons', [
            'foreignKey' => 'pay_reasons_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Endclients',[
            'foreignKey' => 'endclients_id',
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('first_name_ruby', 'create')
            ->notEmpty('first_name_ruby');

        $validator
            ->requirePresence('last_name_ruby', 'create')
            ->notEmpty('last_name_ruby');

        $validator
            ->integer('fee')
            ->requirePresence('fee', 'create')
            ->notEmpty('fee');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->integer('phone_number')
            ->requirePresence('phone_number', 'create')
            ->notEmpty('phone_number');

        $validator
            ->integer('evaluation')
            ->requirePresence('evaluation', 'create')
            ->notEmpty('evaluation');

        $validator
            ->allowEmpty('first_recruiter_name');

        $validator
            ->integer('first_rectuiter_fee')
            ->allowEmpty('first_rectuiter_fee');

        $validator
            ->allowEmpty('second_recruiter_name');

        $validator
            ->integer('second_recruiter_fee')
            ->allowEmpty('second_recruiter_fee');

        $validator
            ->allowEmpty('third_recruiter_name');

        $validator
            ->integer('third_recruiter_fee')
            ->allowEmpty('third_recruiter_fee');

        $validator
            ->allowEmpty('forth_recruiter_name');

        $validator
            ->integer('forth_rectuiter_fee')
            ->allowEmpty('forth_rectuiter_fee');

        $validator
            ->requirePresence('high_schools_name', 'create')
            ->notEmpty('high_schools_name');

        $validator
            ->requirePresence('universities_name', 'create')
            ->notEmpty('universities_name');

        $validator
            ->requirePresence('companies_name', 'create')
            ->notEmpty('companies_name');

        $validator
            ->requirePresence('sns_info', 'create')
            ->notEmpty('sns_info');

        $validator
            ->integer('school_year')
            ->requirePresence('school_year', 'create')
            ->notEmpty('school_year');

        $validator
            ->requirePresence('lived_place', 'create')
            ->notEmpty('lived_place');

        return $validator;
    }
    //Thumbnail画像に関する処理
    function thumbnail(){
      $noimage =  Router::url('/',true) . "img/thumbnail.jpg";

      return $noimage;
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
        $rules->add($rules->existsIn(['paidstatuses_id'], 'Paidstatuses'));
        $rules->add($rules->existsIn(['managers_id'], 'Managers'));
        $rules->add($rules->existsIn(['howtopays_id'], 'Howtopays'));
        $rules->add($rules->existsIn(['projects_id'], 'Projects'));
        $rules->add($rules->existsIn(['commission_admits_id'], 'CommissionAdmits'));
        $rules->add($rules->existsIn(['sexes_id'], 'Sexes'));
        $rules->add($rules->existsIn(['pay_reasons_id'], 'PayReasons'));
        $rules->add($rules->existsIn(['endclients_id'], 'Endclients'));

        return $rules;
    }
}
