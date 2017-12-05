<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStorageInventoryNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('storage_inventory_nomenclature', function(Blueprint $table)
		{
			$table->foreign('nomenclature_id', 'FK_storage_inventory_nomenclature_nomenclature_id')->references('id')->on('nomenclature')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('storage_inventory_nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_storage_inventory_nomenclature_nomenclature_id');
		});
	}

}
