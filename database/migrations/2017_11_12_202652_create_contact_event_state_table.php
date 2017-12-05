<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactEventStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_event_state', function(Blueprint $table)
		{
			$table->string('name', 50)->default('')->primary();
			$table->string('title');
			$table->boolean('sort');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1 - акивный, 2 - неактивный');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_event_state');
	}

}
