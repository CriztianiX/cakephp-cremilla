<?php
namespace CriztianiX\Cremilla\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable;

/**
 * CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable Test Case
 */
class CakephpCremillaWorkersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable
     */
    public $CakephpCremillaWorkers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.criztiani_x/cremilla.cakephp_cremilla_workers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CakephpCremillaWorkers') ? [] : ['className' => 'CriztianiX\Cremilla\Model\Table\CakephpCremillaWorkersTable'];
        $this->CakephpCremillaWorkers = TableRegistry::get('CakephpCremillaWorkers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CakephpCremillaWorkers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
