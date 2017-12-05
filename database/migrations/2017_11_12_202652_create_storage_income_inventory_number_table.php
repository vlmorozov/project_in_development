<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageIncomeInventoryNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_income_inventory_number', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('storage_document_nomenclature_id')->index('storage_document_nomenclature_id')->comment('ID строки поступления номенклатуры');
			$table->enum('status', array('1','2'))->default('1')->comment('Статус');
			$table->string('inventory_number')->comment('Инвентарный номер');
			$table->boolean('stamp')->default(0)->comment('Штамп');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_income_inventory_number');
	}

}
