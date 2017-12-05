<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomenclatureSupplierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomenclature_supplier', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('create_date')->comment('Время создания');
			$table->integer('nomenclature_id')->comment('ID номенклатуры');
			$table->integer('contractor_delivery_id')->index('FK_nomenclature_supplier_contractor_delivery_id')->comment('ID точки доставки');
			$table->decimal('price', 19)->comment('Цена');
			$table->integer('currency_id')->index('FK_nomenclature_supplier_currency_id')->comment('ID валюты цены');
			$table->integer('unit_id')->nullable()->index('FK_nomenclature_supplier_unit_id')->comment('Ед. изм.');
			$table->string('article')->nullable()->comment('Артикул');
			$table->string('in_stock')->nullable()->comment('В наличии');
			$table->integer('user_id')->nullable()->index('FK_nomenclature_supplier_user_id')->comment('ID пользователя, который вносил изменения');
			$table->string('note')->nullable()->comment('Примечание');
			$table->date('actual_date')->nullable()->comment('Дата, с которой актуальна цена');
			$table->unique(['nomenclature_id','contractor_delivery_id','actual_date'], 'UK_nomenclature_supplier');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomenclature_supplier');
	}

}
