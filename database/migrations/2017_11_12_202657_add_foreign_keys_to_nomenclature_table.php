<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nomenclature', function(Blueprint $table)
		{
			$table->foreign('container_type_id', 'FK_nomenclature_container_type_id')->references('id')->on('container_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('delivery_type', 'FK_nomenclature_nomenclature_delivery_type_name')->references('name')->on('nomenclature_delivery_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_nomenclature_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_type_id', 'FK_nomenclature_vehicle_type_id')->references('id')->on('vehicle_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nomenclature', function(Blueprint $table)
		{
			$table->dropForeign('FK_nomenclature_container_type_id');
			$table->dropForeign('FK_nomenclature_nomenclature_delivery_type_name');
			$table->dropForeign('FK_nomenclature_user_id');
			$table->dropForeign('FK_nomenclature_vehicle_type_id');
		});
	}

}
