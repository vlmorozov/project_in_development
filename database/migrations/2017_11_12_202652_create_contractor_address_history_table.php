<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorAddressHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_address_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_contractor_address_history_contractor_id')->comment('ID контрагента');
			$table->enum('type', array('ur','post','fact'))->comment('Тип адреса');
			$table->string('address_text')->nullable()->comment('Адрес');
			$table->dateTime('create_datetime')->comment('Дата и время изменения');
			$table->integer('create_user_id')->nullable()->index('FK_contractor_address_history_user_id')->comment('ID пользователя, который делал изменение');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_address_history');
	}

}
