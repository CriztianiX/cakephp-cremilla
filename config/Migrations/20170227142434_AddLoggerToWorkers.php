<?php
use Migrations\AbstractMigration;

class AddLoggerToWorkers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('cakephp_cremilla_workers');
        $table->addColumn('logger', 'string', [
            'default' => 'defult',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
