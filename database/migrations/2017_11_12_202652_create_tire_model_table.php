<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTireModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tire_model', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mark_model')->nullable()->comment('Марка-модель (официальное название)');
			$table->string('characteristics')->nullable()->comment('Характеристики');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tire_model');
	}

}
