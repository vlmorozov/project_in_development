<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairNomenclatureInventoryNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_nomenclature_inventory_number', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_nomenclature_id')->nullable()->comment('ID номенклатуры ремонта');
			$table->string('inventory_number')->nullable()->comment('Инвентарный номер');
			$table->string('location')->comment('Позиция шины');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->index(['inventory_number','repair_nomenclature_id'], 'inventory_number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_nomenclature_inventory_number');
	}

}
