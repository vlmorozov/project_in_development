<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_fine', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Причина удержания');
			$table->string('type')->comment('Способ удержания (по объему / фиксированно)');
			$table->decimal('amount')->nullable()->comment('Сумма удержания');
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
		Schema::drop('driver_fine');
	}

}
