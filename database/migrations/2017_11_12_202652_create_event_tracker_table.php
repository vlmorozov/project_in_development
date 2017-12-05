<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTrackerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_tracker', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Наименование');
			$table->enum('type', array('in','out'))->nullable()->comment('Тип события');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
			$table->boolean('is_create_out_event')->default(0)->comment('Создавать исх. событие');
			$table->string('out_event_tracker_id')->nullable()->comment('Тема исх. события');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_tracker');
	}

}
