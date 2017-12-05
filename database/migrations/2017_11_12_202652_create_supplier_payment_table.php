<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_payment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('id_1c')->nullable()->comment('ID из 1C');
			$table->integer('id_fb')->nullable()->comment('ID из FB');
			$table->string('doc_num')->nullable()->comment('Номер документа');
			$table->enum('type', array('in','out'))->nullable()->comment('Вид операции');
			$table->integer('create_user_id')->nullable()->comment('ID пользователя, который создал взаиморасчет');
			$table->dateTime('create_datetime')->nullable()->comment('Время создания записи');
			$table->integer('company_id')->nullable()->index('FK_supplier_payment_company_id')->comment('ID организации');
			$table->integer('contractor_id')->nullable()->index('FK_supplier_payment_contractor_id')->comment('ID контрагента');
			$table->date('doc_date')->nullable()->comment('Дата документа');
			$table->date('receipt_date')->nullable()->comment('Дата поступления');
			$table->decimal('amount', 19)->nullable();
			$table->decimal('vat_amount', 19)->nullable();
			$table->text('details', 65535)->nullable()->comment('Назначение платежа');
			$table->string('payment_type')->nullable()->comment('Тип платежа');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('Статус активности');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_payment');
	}

}
