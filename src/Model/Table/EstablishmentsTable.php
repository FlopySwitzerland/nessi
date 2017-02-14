<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Establishments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Academicyears
 *
 * @method \App\Model\Entity\Establishment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Establishment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Establishment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Establishment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Establishment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Establishment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Establishment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EstablishmentsTable extends Table
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

        $this->table('establishments');
        $this->displayField('name');
        $this->primaryKey(['id', 'academicyear_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Academicyears', [
            'foreignKey' => 'academicyear_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('gmapid');

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
        $rules->add($rules->existsIn(['academicyear_id'], 'Academicyears'));

        return $rules;
    }
}
