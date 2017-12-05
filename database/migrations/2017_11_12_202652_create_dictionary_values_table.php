<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDictionaryValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dictionary_values', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('name', 250)->comment('Имя значения');
			$table->string('title', 250)->comment('Название значения');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('Статус активности');
			$table->integer('dictionary_id')->index('FK_dictionary_values_dictionary_id')->comment('ID справочника');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dictionary_values');
	}

}
