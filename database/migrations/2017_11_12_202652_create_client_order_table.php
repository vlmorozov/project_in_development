<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_order', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('create_date')->comment('дата создания');
			$table->integer('create_user_id')->nullable()->index('FK_client_order_create_user_id')->comment('ID пользователя, который создал заказ');
			$table->integer('contractor_id')->comment('ID контрагента');
			$table->integer('contractor_contract_id')->nullable()->comment('ID договора');
			$table->integer('contact_personal_id')->nullable()->index('FK_client_order_contractor_contact_id')->comment('ID контактного лица');
			$table->integer('delivery_contact_id')->nullable()->comment('ID контактного лица (на адресе)');
			$table->integer('incoming_call_id')->nullable()->index('FK_client_order_incoming_call_id')->comment('ID вх. запроса');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_client_order_contractor_delivery_id')->comment('ID точки доставки');
			$table->integer('client_order_status_id')->nullable()->comment('ID статуса клиента');
			$table->integer('shift_id')->nullable()->index('FK_client_order_shift_id')->comment('ID смены');
			$table->date('date_from')->nullable()->comment('Дата с');
			$table->date('date_to')->nullable()->comment('Дата по');
			$table->string('time_from', 5)->nullable()->comment('Время доставки - с');
			$table->string('time_to', 5)->nullable()->comment('Время доставки - по');
			$table->boolean('time_24h')->default(0)->comment('Время доставки - круглосуточно');
			$table->boolean('time_exactly')->nullable()->default(0)->comment('Строго ко времени');
			$table->text('note', 65535)->nullable()->comment('комментарий к заказу');
			$table->integer('type_price_id')->nullable()->comment('ID типа цены');
			$table->boolean('prepayment')->default(0)->comment('Предоплата');
			$table->string('client_order_status_note')->nullable()->comment('Комментарий к изменению статуса');
			$table->integer('currency_id')->nullable()->comment('ID валюты расчетов');
			$table->integer('sheet_id')->nullable()->comment('ID последнего счета, который выставлен по этому заказу');
			$table->integer('responsible_user_id')->nullable()->index('FK_client_order_responsible_user_id')->comment('ID пользователя, ответственного за заказ');
			$table->enum('payment_method', array('наличные','безналичные'))->nullable()->index('IDX_client_order_payment_method')->comment('Форма оплаты');
			$table->string('state', 50)->default('created')->index('FK_client_order_client_order_state_name')->comment('Статус заказа');
			$table->boolean('is_allow_shipment')->default(0)->comment('Разрешить отгрузку при задолженности больше лимита');
			$table->enum('status', array('1','2'))->default('1');
			$table->enum('type', array('tipper','container'))->default('tipper')->comment('Тип заказа (самосвал, контейнер)');
			$table->index(['contractor_id','create_date'], 'IDX_client_order_contractor_id_create_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_order');
	}

}
