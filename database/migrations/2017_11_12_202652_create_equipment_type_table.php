<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipment_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('Наименование');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->boolean('for_call')->nullable()->default(0)->comment('для связи');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipment_type');
	}

}
