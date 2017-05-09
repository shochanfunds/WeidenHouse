<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property int $paidstatuses_id
 * @property int $managers_id
 * @property string $first_name
 * @property string $last_name
 * @property string $first_name_ruby
 * @property string $last_name_ruby
 * @property int $fee
 * @property int $howtopays_id
 * @property \Cake\I18n\Time $birthday
 * @property int $phone_number
 * @property int $evaluation
 * @property string $first_recruiter_name
 * @property int $first_rectuiter_fee
 * @property string $second_recruiter_name
 * @property int $second_recruiter_fee
 * @property string $third_recruiter_name
 * @property int $third_recruiter_fee
 * @property string $forth_recruiter_name
 * @property int $forth_rectuiter_fee
 * @property int $projects_id
 * @property int $commission_admits_id
 * @property string $high_schools_name
 * @property string $universities_name
 * @property int $sexes_id
 * @property string $companies_name
 * @property string $sns_info
 * @property int $pay_reasons_id
 * @property int $school_year
 * @property string $lived_place
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Paidstatus $paidstatus
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Howtopay $howtopay
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\CommissionAdmit $commission_admit
 * @property \App\Model\Entity\Sex $sex
 * @property \App\Model\Entity\PayReason $pay_reason
 */
class Client extends Entity
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
}
