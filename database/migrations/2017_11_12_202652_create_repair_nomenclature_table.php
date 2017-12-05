<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairNomenclatureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_nomenclature', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_nomenclature_repair_id')->comment('ID заявки на ремонт');
			$table->integer('nomenclature_id')->index('FK_repair_nomenclature_nomenclature_id')->comment('ID номенклатуры');
			$table->integer('storage_document_nomenclature_id')->nullable()->comment('Номер строки прихода');
			$table->decimal('volume', 19)->comment('Кол-во');
			$table->boolean('used')->default(0)->comment('б/у');
			$table->string('note')->comment('Комментарий');
			$table->integer('storage_document_id')->nullable()->index('FK_repair_nomenclature_storage_document_id');
			$table->enum('type', array('to_vehicle','from_vehicle','cancellation','wear_cancellation'))->nullable()->comment('Тип перемещения номенклатуры');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактивен');
			$table->integer('shift_storage_document_nomenclature_id')->nullable()->comment('ID прихода номенклатуры');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_nomenclature');
	}

}
