<?php
use Migrations\AbstractMigration;

class AddNotifiedToWorkers extends AbstractMigration
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
        $table->addColumn('notified', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->update();
    }
}
