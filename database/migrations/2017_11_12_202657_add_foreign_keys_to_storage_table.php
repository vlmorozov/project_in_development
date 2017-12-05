<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_repair_storage_company')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_storage_company');
		});
	}

}
