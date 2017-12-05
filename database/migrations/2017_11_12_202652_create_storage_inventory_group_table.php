<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageInventoryGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_inventory_group', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->comment('Название');
			$table->integer('min_number')->default(1)->comment('Минимальное число диапазона');
			$table->integer('max_number')->default(9999)->comment('Максимальное число диапазона');
			$table->string('alphabet')->comment('Символы доступные для инвентарного номера');
			$table->string('format_rule')->default('default')->comment('Правило формирования инвентарного номера');
			$table->string('last')->nullable()->comment('Последний выделенный номер');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_inventory_group');
	}

}
