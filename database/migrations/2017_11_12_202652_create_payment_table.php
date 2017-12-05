<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c')->nullable()->unique('UK_payment_id_1c')->comment('ID из 1C');
			$table->integer('id_fb')->nullable();
			$table->enum('type', array('in','out'))->default('in')->comment('Вид операции (оплата от покупателя / возврат покупателю)');
			$table->integer('create_user_id')->nullable()->comment('ID пользователя, который создал платеж');
			$table->dateTime('create_date')->nullable()->comment('Дата создания');
			$table->integer('company_id')->nullable()->index('FK_payment_company_id')->comment('ID организации');
			$table->integer('contractor_id')->nullable()->index('FK_payment_contractor_id')->comment('ID контрагента');
			$table->integer('sheet_id')->nullable()->index('FK_payment_sheet_id')->comment('ID счета');
			$table->string('doc_num')->nullable()->comment('Номер документа');
			$table->date('doc_date')->nullable()->comment('Дата документа');
			$table->decimal('amount', 19)->nullable()->comment('Сумма платежа');
			$table->string('payer_name')->nullable()->comment('Плательщик. Название');
			$table->string('payer_account')->nullable()->comment('Плательщик. Счет');
			$table->string('payer_inn')->nullable()->comment('Плательщик. ИНН');
			$table->string('payer_kpp')->nullable()->comment('Плательщик. КПП');
			$table->string('payer_bank')->nullable()->comment('Плательщик. Банк');
			$table->string('payer_bic')->nullable()->comment('Плательщик. БИК');
			$table->string('payer_ks')->nullable()->comment('Плательщик. Корр. счет');
			$table->string('payee_name')->nullable()->comment('Получатель. Название');
			$table->string('payee_account')->nullable()->comment('Получатель. Счет');
			$table->string('payee_inn')->nullable()->comment('Получатель. ИНН');
			$table->string('payee_kpp')->nullable()->comment('Получатель. КПП');
			$table->string('payee_bank')->nullable()->comment('Получатель. Банк');
			$table->string('payee_bic')->nullable()->comment('Получатель. БИК');
			$table->string('payee_ks')->nullable()->comment('Получатель. Корр. счет');
			$table->string('payment_type')->nullable()->comment('Вид платежа');
			$table->string('pay_type')->nullable()->comment('Вид оплаты');
			$table->date('receipt_date')->nullable()->comment('Дата поступления');
			$table->date('payment_date')->nullable()->comment('Дата платежа');
			$table->string('details')->nullable()->comment('Назначение платежа');
			$table->string('priority')->nullable()->comment('Очередность платежа');
			$table->integer('cash_flow_type_id')->nullable()->comment('ID статьи движения денежных средств');
			$table->integer('responsible_user_id')->nullable()->comment('ID пользователя, ответственного за платеж');
			$table->decimal('vat_amount', 19)->nullable()->comment('Сумма НДС');
			$table->integer('vat_rate')->nullable()->comment('Ставка НДС');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->integer('contractor_contract_id')->nullable()->index('FK_payment_contractor_contract_id')->comment('ID договора контрагента');
			$table->integer('client_order_id')->nullable()->comment('ID клиентского заказа');
			$table->integer('nomenclature_id')->nullable()->index('FK_payment_nomenclature_id')->comment('ID номенклатуры');
			$table->integer('trip_id')->nullable()->index('FK_payment_trip_id')->comment('ID рейса');
			$table->integer('sheet_type_id')->nullable()->index('FK_payment_sheet_type_id')->comment('ID типа счета');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->boolean('import_1c')->default(0)->comment('Импортирован из 1С');
			$table->boolean('is_confirm')->default(0)->comment('Подтвержден');
			$table->boolean('export_fb')->default(0)->comment('Пометка для выгрузки в ФБ');
			$table->unique(['client_order_id','nomenclature_id','trip_id'], 'UK_payment_client_order_nomenclature_trip');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment');
	}

}
