<?php
use Migrations\AbstractMigration;

class AddObservedAtToWorkers extends AbstractMigration
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
        $table->addColumn('observed_at', 'timestamp', [
            'default' => null,
            'null' => true,
        ]);
        $table->update();
    }
}
