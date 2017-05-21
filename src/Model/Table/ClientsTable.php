<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
use RuntimeException;

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


      public function beforeSave($event, $entity, $options)
      {


          if (!empty($entity->thumbnail["name"])) {
              $entity->thumbnail = $this->_buildThumbnail($entity->thumbnail);
          } else {
              unset($entity->thumbnail);
          }
      }


      protected function _buildThumbnail($thumbnail)
      {

          $ret = file_get_contents($thumbnail['tmp_name']);
          if ($ret === false) {
              $ret = "hogehoge";
          }

          return $ret;
      }
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
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Paidstatuses', [
            'foreignKey' => 'paidstatuses_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Managers', [
            'foreignKey' => 'managers_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Howtopays', [
            'foreignKey' => 'howtopays_id',
            'joinType' => 'LEFT'
        ]);
/*
        $this->belongsTo('Projects', [
            'foreignKey' => 'projects_id',
            'joinType' => 'LEFT'
        ]);
*/

        $this->belongsTo('Projects',[
          //'joinTable' => 'clients_projects',
          'foreignKey' => 'projects_id',
          'joinType' => 'LEFT'
        ]);
        $this->belongsTo('CommissionAdmits', [
            'foreignKey' => 'commission_admits_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Sexes', [
            'foreignKey' => 'sexes_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('PayReasons', [
            'foreignKey' => 'pay_reasons_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Endclients',[
            'foreignKey' => 'endclients_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Categories',[
            'foreignKey' => 'categories_id',
            'joinType' => 'LEFT'
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
             ->integer('age')
             ->allowEmpty('age');

         $validator
             ->allowEmpty('thumbnail');

         $validator
             ->allowEmpty('first_name');

         $validator
             ->allowEmpty('last_name');

         $validator
             ->allowEmpty('first_name_ruby');

         $validator
             ->allowEmpty('last_name_ruby');

         $validator
             ->integer('fee')
             ->allowEmpty('fee');

         $validator
             ->date('birthday')
             ->allowEmpty('birthday');

         $validator
             ->allowEmpty('phone_number');

         $validator
             ->email('email')
             ->allowEmpty('email');

         $validator
             ->integer('evaluation')
             ->allowEmpty('evaluation');

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
             ->allowEmpty('high_schools_name');

         $validator
             ->allowEmpty('universities_name');

         $validator
             ->allowEmpty('companies_name');

         $validator
             ->allowEmpty('sns_info');

         $validator
             ->allowEmpty('activities');

         $validator
             ->integer('school_year')
             ->allowEmpty('school_year');

         $validator
             ->allowEmpty('lived_place');

         $validator
             ->allowEmpty('remarks');

         $validator
             ->allowEmpty('prefecture');

         $validator
             ->allowEmpty('address1');

         $validator
             ->allowEmpty('address2');

         $validator
             ->allowEmpty('post_number');

         $validator
             ->allowEmpty('bunk_name');

         $validator
             ->allowEmpty('branch_name');

         $validator
             ->allowEmpty('branch_num');

         $validator
             ->allowEmpty('bank_number');

         $validator
             ->allowEmpty('thumbnail_name');

         return $validator;
     }
    //Thumbnail画像に関する処理
    function thumbnail(){
      $noimage =  Router::url('/',true) . "img/thumbnail/";

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
        //$rules->add($rules->existsIn(['paidstatuses_id'], 'Paidstatuses'));
        //$rules->add($rules->existsIn(['managers_id'], 'Managers'));
        //$rules->add($rules->existsIn(['howtopays_id'], 'Howtopays'));
        //$rules->add($rules->existsIn(['projects_id'], 'Projects'));
        //$rules->add($rules->existsIn(['commission_admits_id'], 'CommissionAdmits'));
        //$rules->add($rules->existsIn(['sexes_id'], 'Sexes'));
        //$rules->add($rules->existsIn(['pay_reasons_id'], 'PayReasons'));
        //$rules->add($rules->existsIn(['endclients_id'], 'Endclients'));

        return $rules;
    }
}
