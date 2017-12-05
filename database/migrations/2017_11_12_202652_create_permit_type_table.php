<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermitTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permit_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('Наименование');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permit_type');
	}

}
