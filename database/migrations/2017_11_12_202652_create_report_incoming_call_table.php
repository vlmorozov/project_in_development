<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportIncomingCallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_incoming_call', function(Blueprint $table)
		{
			$table->integer('id')->primary()->comment('ID входящего');
			$table->boolean('is_new')->default(0)->comment('Новый');
			$table->dateTime('call_datetime')->comment('Дата и время звонка');
			$table->integer('duration')->comment('Длительность звонка');
			$table->string('source_title')->comment('Источник');
			$table->boolean('is_took')->default(0)->comment('Принят');
			$table->string('interested_services')->nullable()->comment('Услуга');
			$table->string('contractor_title')->nullable()->comment('Контрагент');
			$table->boolean('is_executed')->default(0)->comment('Выполнен');
			$table->string('contractor_contact_name')->nullable()->comment('Контактное лицо. Имя');
			$table->string('contractor_contact_phone')->nullable()->comment('Контактное лицо. Телефон');
			$table->string('contractor_contact_email')->nullable()->comment('Контактное лицо. Email');
			$table->string('reclama_title')->nullable()->comment('Реклама');
			$table->string('recipient')->nullable()->comment('Внутренний тел (при переадресации с мобильного)');
			$table->string('manager_name')->nullable()->comment('Менеджер');
			$table->string('create_user_name')->nullable()->comment('Автор');
			$table->string('event_tracker_title')->nullable()->comment('Название трека');
			$table->integer('client_order_id')->nullable()->comment('ID заказа');
			$table->integer('client_order_sum')->nullable()->comment('Сумма заказа');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('report_incoming_call');
	}

}
