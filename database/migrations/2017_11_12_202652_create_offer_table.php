<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('incoming_call_id')->nullable()->index('FK_offer_incoming_call_id')->comment('ID вх. запроса');
			$table->integer('contractor_id')->nullable()->index('FK_offer_contractor_id')->comment('Контрагент. ID');
			$table->string('contractor_title')->nullable()->comment('Контрагент. Название');
			$table->integer('contractor_contact_id')->nullable()->index('FK_offer_contractor_contact_id')->comment('Контактное лицо. ID');
			$table->string('contractor_contact_name', 50)->nullable()->comment('Контактное лицо. Имя');
			$table->string('contractor_contact_phone')->nullable()->comment('Контактное лицо. Телефон');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_offer_create_user_id')->comment('ID пользователя, который создал');
			$table->integer('manager_id')->nullable()->index('FK_offer_manager_id')->comment('ID пользователя, который является ответственным');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_offer_contractor_delivery_id')->comment('ID точки контрагента');
			$table->string('contractor_delivery_address')->nullable()->comment('Адрес');
			$table->float('contractor_delivery_lat', 10, 0)->nullable()->comment('Широта');
			$table->float('contractor_delivery_lng', 10, 0)->nullable()->comment('Долгота');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
			$table->enum('status', array('1','2'))->default('1')->comment('1-активен, 2-неактивен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer');
	}

}
