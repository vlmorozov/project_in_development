<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientOrderManagerHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_order_manager_history', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('manager_id')->nullable()->index('FK_client_order_manager_history_manager_id')->comment('ID ответственного менеджера');
			$table->dateTime('create_datetime')->comment('Дата изменения');
			$table->integer('create_user_id')->nullable()->index('FK_client_order_manager_history_user_id')->comment('автор изменения');
			$table->integer('status')->default(1)->comment('статус');
			$table->integer('client_order_id')->index('FK_client_order_manager_history_client_order_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_order_manager_history');
	}

}
