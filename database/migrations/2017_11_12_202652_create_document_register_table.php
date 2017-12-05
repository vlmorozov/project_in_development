<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRegisterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_register', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_')->nullable()->unique('UK_document_register__id')->comment('ID по порядку');
			$table->dateTime('create_datetime')->comment('Дата создания');
			$table->integer('create_user_id')->nullable()->index('FK_document_register_user_id')->comment('ID пользователя, который создал заказ');
			$table->text('template', 65535)->nullable()->comment('Путь к шаблону xls');
			$table->string('state', 50)->nullable()->index('FK_document_register_document_register_state_name')->comment('Статус');
			$table->date('date_start')->nullable()->comment('"Дата с" реестра');
			$table->date('date_end')->nullable()->comment('"Дата по" реестра');
			$table->integer('contractor_id')->nullable()->index('FK_document_register_contractor_id')->comment('ID контрагента');
			$table->integer('contractor_contract_id')->nullable()->index('FK_document_register_contractor_contract_id')->comment('ID договора');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_document_register_contractor_delivery_id')->comment('ID точки доставки');
			$table->integer('unloading_contractor_delivery_id')->nullable()->index('FK_document_register_unloading_contractor_delivery_id')->comment('ID точки доставки 2');
			$table->integer('nomenclature_id')->nullable()->index('FK_document_register_nomenclature_id')->comment('ID номенклатуры');
			$table->integer('shift_id')->nullable()->index('FK_document_register_shift_id')->comment('ID смены');
			$table->enum('report_type', array('volume','downtime'))->nullable()->comment('Тип отчета (по объему / по часам)');
			$table->enum('payment_method', array('наличные','безналичные'))->nullable()->comment('Форма оплаты');
			$table->enum('is_confirm', array('y','n'))->nullable()->comment('Все (NULL) / Подтвержденные / Неподтвержденные');
			$table->integer('file_id')->nullable()->index('FK_document_register_uploaded_files_id')->comment('ID файла отчета');
			$table->text('note', 65535)->nullable()->comment('Комментарий к документу');
			$table->enum('status', array('1','2'))->nullable()->comment('NULL - объект создан при формировании отчета, 1 - активный, 2 - неактивный');
			$table->integer('client_order_id')->nullable()->index('FK_document_register_client_order_id');
			$table->decimal('volume_total')->nullable()->comment('Общей объем ');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_register');
	}

}
