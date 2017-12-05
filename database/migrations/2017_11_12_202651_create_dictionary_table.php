<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDictionaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dictionary', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->string('name', 100)->comment('Имя справочника');
			$table->string('title')->comment('Название справочника');
			$table->enum('status', array('1','2'))->nullable()->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dictionary');
	}

}
