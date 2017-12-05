<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclatureDeliveryTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_delivery_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->unique('UK_nomenclature_delivery_type_name');
			$table->string('title');
			$table->string('generalization_type');
			$table->boolean('sort')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_delivery_type');
	}

}
