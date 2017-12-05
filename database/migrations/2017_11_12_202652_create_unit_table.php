<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->enum('status', array('1','2'))->nullable();
			$table->string('title')->nullable();
			$table->string('title_full')->nullable();
			$table->string('code')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('unit');
	}

}
