<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyRequisitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_requisites', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_company_requisites_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('currency_id', 'FK_company_requisites_currency_id')->references('id')->on('currency')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_requisites', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_requisites_company_id');
			$table->dropForeign('FK_company_requisites_currency_id');
		});
	}

}
