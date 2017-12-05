<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_contact', function(Blueprint $table)
		{
			$table->foreign('company_id', 'FK_company_contact_company_id')->references('id')->on('company')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_contact', function(Blueprint $table)
		{
			$table->dropForeign('FK_company_contact_company_id');
		});
	}

}
