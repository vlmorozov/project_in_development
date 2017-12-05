<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactEventTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_event_type', function(Blueprint $table)
		{
			$table->string('name', 50)->default('')->primary();
			$table->string('title');
			$table->string('icon');
			$table->boolean('sort');
			$table->string('status')->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_event_type');
	}

}
