<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_user_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('company_unit_id', 'FK_user_company_unit_id')->references('id')->on('company_unit')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_contact_id', 'FK_user_contractor_contact_id')->references('id')->on('contractor_contact')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('position_id', 'FK_user_position_id')->references('id')->on('position')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function(Blueprint $table)
		{
			$table->dropForeign('FK_user_company_id');
			$table->dropForeign('FK_user_company_unit_id');
			$table->dropForeign('FK_user_contractor_contact_id');
			$table->dropForeign('FK_user_position_id');
		});
	}

}
