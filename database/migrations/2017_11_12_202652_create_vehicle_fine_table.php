<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_fine', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('create_user_id')->nullable()->comment('ID пользователя');
			$table->dateTime('create_datetime')->comment('Дата занесения в КИС');
			$table->dateTime('update_datetime')->nullable();
			$table->integer('vehicle_id')->index('FK_vehicle_fine_vehicle_id')->comment('ID ТС');
			$table->string('doc_num')->unique('doc_num_UNIQUE')->comment('Номер постановления');
			$table->date('doc_date')->nullable()->comment('Дата постановления');
			$table->dateTime('violation_datetime')->nullable()->comment('Дата и время нарушения');
			$table->string('violation_article')->nullable()->comment('Статья нарушения (КоАП)');
			$table->integer('violation_article_id')->nullable()->comment('ID статьи из справочника vehicle_fine_article');
			$table->string('violator', 50)->nullable()->comment('Нарушитель');
			$table->decimal('fine_amount')->nullable()->comment('Сумма штрафа');
			$table->decimal('fine_amount_discount')->nullable()->comment('Сумма штрафа со скидкой');
			$table->date('fine_date_discount')->nullable()->comment('Дата, до которой действует скидка');
			$table->string('payee_name')->nullable()->comment('Получатель. Название');
			$table->string('payee_account')->nullable()->comment('Получатель. Счет');
			$table->string('payee_inn')->nullable()->comment('Получатель. ИНН');
			$table->string('payee_kpp')->nullable()->comment('Получатель. КПП');
			$table->string('payee_bank')->nullable()->comment('Получатель. Банк');
			$table->string('payee_bic')->nullable()->comment('Получатель. БИК');
			$table->string('payee_kbk')->nullable()->comment('Получатель. КБК');
			$table->string('payee_oktmo')->nullable()->comment('Получатель. ОКТМО');
			$table->string('payee_okato')->nullable()->comment('Получатель. ОКАТО');
			$table->enum('payment_method', array('1','2'))->nullable()->comment('Форма оплаты');
			$table->boolean('is_paid')->default(0)->comment('Оплачено');
			$table->integer('driver_payment_id')->nullable()->index('FK_vehicle_fine_driver_payment_id')->comment('ID начисления на водителя');
			$table->integer('driver_id')->nullable()->index('FK_vehicle_fine_driver_id')->comment('ID водителя');
			$table->string('division', 20)->nullable()->comment('номер подразделения, которому идет оплата штрафа');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_fine');
	}

}
