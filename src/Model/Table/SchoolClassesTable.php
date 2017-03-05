<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SchoolClasses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Establishments
 * @property \Cake\ORM\Association\BelongsToMany $Branches
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\SchoolClass get($primaryKey, $options = [])
 * @method \App\Model\Entity\SchoolClass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SchoolClass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SchoolClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SchoolClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SchoolClass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SchoolClass findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchoolClassesTable extends Table
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

        $this->setTable('school_classes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Establishments', [
            'foreignKey' => 'establishment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Branches', [
            'foreignKey' => 'school_class_id',
            'targetForeignKey' => 'branch_id',
            'joinTable' => 'branches_school_classes'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'school_class_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'school_classes_users'
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
        $rules->add($rules->existsIn(['establishment_id'], 'Establishments'));

        return $rules;
    }
}
