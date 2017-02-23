<?php
namespace CriztianiX\Cremilla\Test\TestCase\Form;

use Cake\TestSuite\TestCase;
use CriztianiX\Cremilla\Form\CakephpCremillaWorkersForm;

/**
 * CriztianiX\Cremilla\Form\CakephpCremillaWorkersForm Test Case
 */
class CakephpCremillaWorkersFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CriztianiX\Cremilla\Form\CakephpCremillaWorkersForm
     */
    public $CakephpCremillaWorkers;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->CakephpCremillaWorkers = new CakephpCremillaWorkersForm();
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
