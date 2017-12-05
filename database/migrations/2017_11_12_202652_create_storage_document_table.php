<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorageDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('storage_document', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID документа прихода');
			$table->enum('type', array('income','movement','cancellation','depreciation','correction'))->nullable()->comment('Тип документа');
			$table->integer('doc_number')->nullable();
			$table->date('date')->comment('Дата прихода');
			$table->integer('currency_id')->nullable()->comment('ID валюты');
			$table->integer('storage_id')->nullable()->index('FK_storage_document_income_storage')->comment('ID склада (не используется)');
			$table->integer('company_id')->nullable()->index('FK_storage_document_income_company')->comment('ID компании');
			$table->integer('contractor_id')->nullable()->index('FK_storage_document_income_contractor')->comment('ID контрактора');
			$table->integer('contractor_contract_id')->nullable()->index('FK_storage_document_income_contractor_contract')->comment('ID контракта');
			$table->enum('payment_method', array('наличные','безналичные'))->nullable()->comment('Форма оплаты');
			$table->string('waybill', 50)->nullable()->comment('Номер накладной');
			$table->enum('state', array('new','instore','canceled','accepted','sent','debug'))->nullable()->default('new')->comment('Пометка оприходован');
			$table->text('note', 65535)->comment('Примечание');
			$table->integer('file_id')->nullable()->comment('Скан накладной');
			$table->dateTime('create_datetime')->nullable()->comment('Создание документов');
			$table->integer('create_user_id')->nullable()->index('FK_storage_document_income_user')->comment('ID пользователя');
			$table->enum('status', array('1','2'))->default('1')->comment('Статутс');
			$table->enum('type_movement', array('storage_vehicle','vehicle_storage','storage_storage'))->nullable()->comment('Тип перемещения');
			$table->string('create_as')->nullable()->comment('Создан как');
			$table->integer('in_storage_id')->nullable()->index('FK_storage_document_in_storage_id')->comment('ID склада получаеля');
			$table->integer('out_storage_id')->nullable()->index('FK_storage_document_out_storage_id')->comment('ID склада отправителя');
			$table->integer('in_vehicle_id')->nullable()->index('FK_storage_document_in_vehicle_id')->comment('ID тс получаеля');
			$table->integer('out_vehicle_id')->nullable()->index('FK_storage_document_out_vehicle_id')->comment('ID тс отправителя');
			$table->enum('vehicle_type', array('vehicle','trailer'))->nullable()->default('vehicle')->comment('Тип ТС');
			$table->integer('in_trailer_id')->nullable()->comment('ID тс получаеля');
			$table->integer('out_trailer_id')->nullable()->comment('ID тс отправителя');
			$table->integer('repair_id')->nullable()->index('FK_storage_document_repair_id')->comment('ID заявки на ремонт');
			$table->string('cancellation_reason')->nullable()->comment('ID причины списания');
			$table->integer('driver_id')->nullable()->index('FK_storage_document_driver_id');
			$table->integer('vehicle_id')->nullable()->index('FK_storage_document_vehicle_id');
			$table->integer('repair_place_id')->nullable()->index('FK_storage_document_repair_place_id');
			$table->string('allocation')->comment('Куда потрачены расходники');
			$table->string('id_1c', 20)->nullable()->comment('Номер 1С');
			$table->boolean('export_1c')->nullable()->default(0)->comment('Нужно выгрузить в 1С');
			$table->integer('printed_user_id')->nullable()->index('FK_storage_document_printed_user')->comment('ID пользователя, который распечатал документ');
			$table->dateTime('printed_create_datetime')->nullable()->comment('Дата и время распечатки документа');
			$table->integer('printed_certificate_user_id')->nullable()->comment('ID пользователя, который распечатал акт на списание');
			$table->dateTime('printed_certificate_create_datetime')->nullable()->comment('Дата и время распечатки акта на списание');
			$table->integer('trailer_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('storage_document');
	}

}
