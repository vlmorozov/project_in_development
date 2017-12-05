<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_unit', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_company_unit_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_unit', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_unit_company_id');
		});
	}

}
