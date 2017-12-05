<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientOrderStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_order_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('client_order_id')->index('FK_client_order_state_history_client_order_id')->comment('ID клиентского заказа');
			$table->string('state', 50)->index('FK_client_order_state_history_client_order_state_name')->comment('Статус');
			$table->dateTime('create_date')->comment('Дата изменения');
			$table->integer('user_id')->nullable()->index('FK_client_order_state_history_user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('комментарий к изменению статуса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_order_state_history');
	}

}
