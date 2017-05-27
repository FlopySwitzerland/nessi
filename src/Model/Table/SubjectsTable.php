<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SchoolClasses
 * @property \Cake\ORM\Association\HasMany $Marks
 * @property \Cake\ORM\Association\BelongsToMany $Terms
 *
 * @method \App\Model\Entity\Subject get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subject findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubjectsTable extends Table
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

        $this->setTable('subjects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SchoolClasses', [
            'foreignKey' => 'school_class_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Marks', [
            'foreignKey' => 'subject_id'
        ]);
        $this->belongsToMany('Terms', [
            'foreignKey' => 'subject_id',
            'targetForeignKey' => 'term_id',
            'joinTable' => 'subjects_terms'
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
            ->allowEmpty('img');

        $validator
            ->integer('marks_count')
            ->allowEmpty('marks_count');

        $validator
            ->numeric('avg_round')
            ->requirePresence('avg_round', 'create')
            ->notEmpty('avg_round');

        $validator
            ->numeric('avg_semester')
            ->requirePresence('avg_semester', 'create')
            ->notEmpty('avg_semester');

        $validator
            ->integer('avg_sup')
            ->requirePresence('avg_sup', 'create')
            ->notEmpty('avg_sup');

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
        $rules->add($rules->existsIn(['school_class_id'], 'SchoolClasses'));

        return $rules;
    }
}
