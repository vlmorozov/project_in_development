<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->index('IDX_settings_name')->comment('Название');
			$table->string('settings_group')->comment('Группа');
			$table->string('title')->nullable()->comment('Наименование');
			$table->string('value')->nullable()->comment('Значение');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1 - активен, 2 - неактиване');
			$table->enum('type', array('string','number','double','percent'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
