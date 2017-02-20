<?php
namespace CriztianiX\Cremilla\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CakephpCremillaWorkers Model
 *
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker get($primaryKey, $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker newEntity($data = null, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker[] newEntities(array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker[] patchEntities($entities, array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaWorker findOrCreate($search, callable $callback = null, $options = [])
 */
class CakephpCremillaWorkersTable extends Table
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

        $this->table('cakephp_cremilla_workers');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->integer('pid')
            ->requirePresence('pid', 'create')
            ->notEmpty('pid');

        $validator
            ->requirePresence('hostname', 'create')
            ->notEmpty('hostname');

        return $validator;
    }
}
