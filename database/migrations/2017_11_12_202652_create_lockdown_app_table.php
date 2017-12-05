<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLockdownAppTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lockdown_app', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('package_name', 50);
			$table->string('app_name', 50)->nullable();
			$table->string('parameters')->nullable();
			$table->boolean('visible')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lockdown_app');
	}

}
