<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c')->nullable()->comment('ID в базе 1С');
			$table->integer('doc_num')->nullable()->comment('Номер счета');
			$table->dateTime('create_date')->comment('дата создания');
			$table->integer('create_user_id')->index('FK_sheet_user_id')->comment('ID пользователя, который создал счет');
			$table->integer('client_order_id')->nullable()->index('FK_sheet_client_order_id')->comment('ID клиентского заказа');
			$table->integer('company_id')->index('FK_sheet_company_id')->comment('ID организации, от которой выставлен счет');
			$table->integer('company_requisite_id')->nullable()->index('FK_sheet_company_requisites_id')->comment('ID счета получателя');
			$table->integer('sheet_status_id')->nullable()->comment('ID статуса счета');
			$table->string('sheet_status_note')->nullable()->comment('Комментарий с статусу');
			$table->integer('sheet_type_id')->nullable()->index('FK_sheet_sheet_type_id')->comment('ID типа счета');
			$table->integer('document_id')->nullable()->index('FK_sheet_document_id')->comment('ID документа');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->boolean('export_1c')->default(0)->comment('Пометка для выгрузки в 1с');
			$table->string('state', 50)->nullable()->index('FK_sheet_sheet_state_name')->comment('Состояние счета');
			$table->integer('currency_id')->nullable()->index('FK_sheet_currency_id')->comment('ID валюты расчетов');
			$table->integer('contractor_id')->nullable()->index('FK_sheet_contractor_id')->comment('ID контрагента');
			$table->integer('contractor_contract_id')->nullable()->index('FK_sheet_contractor_contract_id')->comment('ID договора');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_sheet_contractor_delivery_id')->comment('ID точки доставки');
			$table->string('create_as')->nullable()->comment('Создан как');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sheet');
	}

}
