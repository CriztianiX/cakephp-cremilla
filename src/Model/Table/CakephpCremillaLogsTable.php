<?php
namespace CriztianiX\Cremilla\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CakephpCremillaLogs Model
 *
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog get($primaryKey, $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog newEntity($data = null, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog[] newEntities(array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog[] patchEntities($entities, array $data, array $options = [])
 * @method \CriztianiX\Cremilla\Model\Entity\CakephpCremillaLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CakephpCremillaLogsTable extends Table
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

        $this->table('cakephp_cremilla_logs');
        $this->displayField('id');
        $this->primaryKey('id');

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
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message');

        $validator
            ->allowEmpty('context');

        return $validator;
    }


    /**
     * Write the log to database
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return bool Success
     */
    public function log($level, $message, array $context = []) {
        $data = [
            'type' => $level,
            'message' => trim(is_string($message) ? $message : print_r($message, true)),
            'context' => trim(is_string($context) ? $context : print_r($context, true)),
        ];
        
        $log = $this->newEntity($data);
        return (bool)$this->save($log);
    }
}
