<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contract', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->nullable()->index('FK_contractor_contract_contractor_id')->comment('ID контрагента');
			$table->integer('org_id')->nullable()->comment('ID организации (не используется)');
			$table->integer('company_id')->nullable()->index('FK_contractor_contract_company_id')->comment('ID организации');
			$table->string('type')->nullable()->comment('Вид договора (не используется)');
			$table->string('doc_num')->nullable()->comment('Номер договора');
			$table->date('doc_date')->nullable()->comment('Дата договора');
			$table->date('action_from_date')->nullable()->comment('Период действия - с');
			$table->date('action_to_date')->nullable()->comment('Период действия - по');
			$table->integer('id_')->nullable()->comment('Порядковый номер в году');
			$table->string('title')->nullable()->comment('Наименование');
			$table->integer('direction_sales_id')->nullable()->comment('ID направления продаж');
			$table->integer('type_payment_id')->nullable()->index('FK_contractor_contract_payment_type_id')->comment('ID вида расчета');
			$table->integer('currency_id')->nullable()->comment('ID валюты');
			$table->decimal('amount', 19)->nullable()->comment('Сумма договора');
			$table->integer('file_id')->nullable()->comment('ID файла');
			$table->string('commentary')->nullable()->comment('Комментарий');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->integer('volume')->nullable()->comment('Объем договора');
			$table->boolean('is_frame')->default(0)->comment('рамочный');
			$table->boolean('prolongation')->default(0)->comment('с пролонгацией');
			$table->integer('type_price_id')->nullable()->comment('ID типа цены');
			$table->integer('contract_id')->nullable()->index('FK_contractor_contract_contractor_contract_id')->comment('ID родительского договора');
			$table->integer('nomenclature_id')->nullable()->index('FK_contractor_contract_nomenclature_id')->comment('ID номенклатуры');
			$table->decimal('price', 19)->nullable()->comment('Цена');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_contractor_contract_contractor_delivery_id')->comment('ID точки доставки');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_contractor_contract_user_id')->comment('ID пользователя, который создал карточку');
			$table->integer('template_id')->nullable()->index('FK_contractor_contract_contractor_contract_template_id')->comment('ID шаблона');
			$table->boolean('is_send_notification')->default(0)->comment('Отправлять уведомления');
			$table->integer('document_file_id')->nullable()->index('FK_contractor_contract_document_file_id');
			$table->string('state')->nullable()->index('FK_contractor_contract_contractor_contract_state_name')->comment('Статус');
			$table->date('post_send_date')->nullable();
			$table->date('courier_send_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contract');
	}

}
