<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclatureCharacteristicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_characteristic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_id');
			$table->integer('characteristic_id')->index('FK_nomenclature_characteristic_characteristic_id');
			$table->string('value')->nullable();
			$table->unique(['nomenclature_id','characteristic_id'], 'UK_nomenclature_characteristic');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_characteristic');
	}

}
