<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientOrderSheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_order_sheet', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_client_order_sheet_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sheet_id', 'FK_client_order_sheet_sheet_id')->references('id')->on('sheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_order_sheet', function(Blueprint $table)
		{
			$table->dropForeign('FK_client_order_sheet_client_order_id');
			$table->dropForeign('FK_client_order_sheet_sheet_id');
		});
	}

}
