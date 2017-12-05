<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor', function(Blueprint $table)
		{
			$table->foreign('main_personal_id', 'FK_contractor_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('parent_contractor_id', 'FK_contractor_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manager_id', 'FK_contractor_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('reclama_id', 'FK_contractor_reclama_id')->references('id')->on('reclama')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_contractor_contact_id');
			$table->dropForeign('FK_contractor_contractor_id');
			$table->dropForeign('FK_contractor_manager_id');
			$table->dropForeign('FK_contractor_reclama_id');
			$table->dropForeign('FK_contractor_user_id');
		});
	}

}
