<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorDeliveryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_delivery', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->nullable()->index('FK_contractor_delivery_contractor_id')->comment('ID контрагента');
			$table->integer('contractor_contact_id')->nullable()->index('FK_contractor_delivery_contractor_contact_id')->comment('ID контактного лица');
			$table->string('title')->nullable()->comment('Название');
			$table->string('address')->nullable()->comment('адрес');
			$table->string('address_docs')->nullable()->comment('адрес для документов');
			$table->string('commentary')->nullable()->comment('комментарий');
			$table->float('lat', 9, 6)->nullable()->default(0.000000)->comment('широта (по яндексу)');
			$table->float('lng', 9, 6)->nullable()->default(0.000000)->comment('долгота (по яндексу)');
			$table->string('delay')->nullable()->comment('задержка на точке (мин)');
			$table->string('time_from')->nullable()->comment('окно доставки - от');
			$table->string('time_to')->nullable()->comment('окно доставки - до');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->integer('distance')->nullable()->comment('Расстояние до базы (км)');
			$table->unique(['lat','lng','contractor_id'], 'UK_contractor_delivery');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_delivery');
	}

}
