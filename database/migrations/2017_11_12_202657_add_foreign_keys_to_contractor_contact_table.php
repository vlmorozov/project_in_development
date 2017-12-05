<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_contact', function(Blueprint $table)
		{
			$table->foreign('contractor_id', 'FK_contractor_contact_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_contact', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_contact_contractor_id');
		});
	}

}
