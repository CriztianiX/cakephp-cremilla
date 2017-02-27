<?php
namespace CriztianiX\Cremilla\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

/**
 * CakephpCremillaWorkers Form.
 */
class CakephpCremillaWorkersForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
        return $schema;
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
        $cakeBin = APP . '..' .  DS . 'bin' . DS . 'cake CriztianiX/Cremilla.worker';
        $queue = $data['queue'] ?? 'default';
        $logger = $data['logger'] ?? 'stdout';

        $args = [
            $cakeBin,
            "--queue " . $queue,
            "--logger " . $logger,
            "> /dev/null 2>/dev/null &"
        ];

        $cmd = implode(" ", $args);
        exec($cmd, $output, $return_var);
        
        return($return_var == 0);
    }
}
