<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReferenceScopeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reference_scope', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 80)->nullable()->comment('Текстовое поля, необязательно');
			$table->enum('status', array('1','2'))->nullable()->comment('активен, да/нет');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reference_scope');
	}

}
