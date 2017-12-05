<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientOrderSheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_order_sheet', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('client_order_id')->comment('ID клиентского заказа');
			$table->integer('sheet_id')->index('FK_client_order_sheet_sheet_id')->comment('ID счета');
			$table->unique(['client_order_id','sheet_id'], 'UK_client_order_sheet');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_order_sheet');
	}

}
