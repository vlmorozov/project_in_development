<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_rating', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_contractor_rating_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_contractor_rating_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_rating_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_rating', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_rating_client_order_id');
			$table->dropForeign('FK_contractor_rating_contractor_id');
			$table->dropForeign('FK_contractor_rating_user_id');
		});
	}

}
