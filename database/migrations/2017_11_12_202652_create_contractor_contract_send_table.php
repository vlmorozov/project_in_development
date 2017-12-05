<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContractSendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contract_send', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->comment('ID полькозателя');
			$table->integer('contractor_contract_id')->comment('ID договора контрагента');
			$table->integer('contractor_contact_id')->nullable()->comment('ID контактного лица');
			$table->dateTime('send_datetime')->comment('Дата и время отправки');
			$table->string('send_address')->comment('Адрес отправления');
			$table->boolean('success')->default(0)->comment('Флаг успешной отправки');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contract_send');
	}

}
