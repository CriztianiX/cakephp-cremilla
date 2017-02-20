<?php
use Migrations\AbstractMigration;

/**
 * Add this for PostgreSQL via:
 * bin/cake Migrations migrate -p Cremilla
 *
 * It uses the default database collation and encoding (utf8 or utf8mb4 etc).
 */
class InitDatabaseWorkers extends AbstractMigration {

	/**
	 * @return void
	 */
	public function up() {
		$this->table('cakephp_cremilla_workers')
			->addColumn('pid', 'integer', [
				'default' => null,
				'null' => false,
			])
			->addColumn('hostname', 'string', [
				'default' => null,
				'limit' => 50,
				'null' => false,
			])
			->create();
	}

	/**
	 * @return void
	 */
	public function down() {
		$this->dropTable('cakephp_cremilla_workers');
	}

}
