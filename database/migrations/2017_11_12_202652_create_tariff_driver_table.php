<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTariffDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tariff_driver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('distance_from')->nullable()->comment('Расстояние от');
			$table->integer('distance_to')->nullable()->comment('Расстояние до');
			$table->date('actual_date')->comment('Дата, с которой актуальна цена');
			$table->decimal('price', 19)->comment('Стоимость');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tariff_driver');
	}

}
