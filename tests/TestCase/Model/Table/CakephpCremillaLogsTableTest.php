<?php
namespace CriztianiX\Cremilla\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cremilla\Model\Table\CakephpCremillaLogsTable;

/**
 * Cremilla\Model\Table\CakephpCremillaLogsTable Test Case
 */
class CakephpCremillaLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Cremilla\Model\Table\CakephpCremillaLogsTable
     */
    public $CakephpCremillaLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cremilla.cakephp_cremilla_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CakephpCremillaLogs') ? [] : ['className' => 'Cremilla\Model\Table\CakephpCremillaLogsTable'];
        $this->CakephpCremillaLogs = TableRegistry::get('CakephpCremillaLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CakephpCremillaLogs);

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
