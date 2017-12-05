<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_unit', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c')->nullable()->comment('ID в базе 1С');
			$table->integer('company_id')->index('FK_company_unit_company_id')->comment('ID Организации');
			$table->string('title')->comment('Название подразделения');
			$table->boolean('is_load_contact_event')->default(0)->comment('Загружать исх. события (из астериска)');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_unit');
	}

}
