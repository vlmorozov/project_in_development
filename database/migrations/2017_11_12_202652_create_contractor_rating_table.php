<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_contractor_rating_contractor_id')->comment('ID контрагента');
			$table->integer('client_order_id')->nullable()->unique('UK_contractor_rating_client_order_id')->comment('ID клиентского заказа');
			$table->integer('cnt')->comment('Кол-во баллов');
			$table->dateTime('create_datetime')->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_contractor_rating_user_id')->comment('ID пользователя, который создал запись');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - неактиване');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_rating');
	}

}
