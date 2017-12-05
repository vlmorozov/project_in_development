<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheetNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sheet_id')->comment('ID счета');
			$table->integer('nomenclature_id')->index('FK_sheet_nomenclature_nomenclature_id')->comment('ID номенклатуры');
			$table->string('title')->comment('Название номенклатуры');
			$table->unique(['sheet_id','nomenclature_id'], 'UK_sheet_nomenclature');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sheet_nomenclature');
	}

}
