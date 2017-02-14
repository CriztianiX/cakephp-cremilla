<?php
use Migrations\AbstractMigration;

/**
 * Add this for PostgreSQL via:
 * bin/cake Migrations migrate -p Cremilla
 *
 * It uses the default database collation and encoding (utf8 or utf8mb4 etc).
 */
class InitDatabaseLogs extends AbstractMigration {

	/**
	 * @return void
	 */
	public function up() {
		$this->table('cakephp_cremilla_logs')
			->addColumn('type', 'string', [
				'default' => null,
				'limit' => 50,
				'null' => false,
			])
			->addColumn('message', 'text', [
				'default' => null,
				'limit' => null,
				'null' => false,
			])
			->addColumn('context', 'text', [
				'default' => null,
				'limit' => null,
				'null' => true,
			])
			->addColumn('created', 'timestamp', [
				'default' => null,
				'limit' => null,
				'null' => true,
			])
			->create();
	}

	/**
	 * @return void
	 */
	public function down() {
		$this->dropTable('cakephp_cremilla_logs');
	}

}
