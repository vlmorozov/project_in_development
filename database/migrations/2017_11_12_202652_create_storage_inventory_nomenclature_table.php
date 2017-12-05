<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageInventoryNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_inventory_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nomenclature_id')->index('nomenclature_id')->comment('ID номенклатуры');
			$table->integer('storage_inventory_group_id')->default(1)->comment('ID группы инвентаризации');
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
		Schema::drop('storage_inventory_nomenclature');
	}

}
