<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('position', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c')->nullable()->comment('ID в базе 1С');
			$table->string('title');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->boolean('in_shift_mechanic')->nullable()->comment('Участвует в плнировании смен механиков');
			$table->integer('position_category_id')->nullable()->comment('Категория должности');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('position');
	}

}
