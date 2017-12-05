<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contact', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_id')->index('FK_contractor_contact_contractor_id')->comment('ID контрагента');
			$table->string('name')->nullable()->comment('ФИО');
			$table->string('post')->nullable()->comment('Должность');
			$table->date('date_birth')->nullable()->comment('Дата рождения');
			$table->string('phone')->nullable()->comment('Телфон');
			$table->string('phone_add')->nullable()->comment('Телефон доб.');
			$table->string('phone_mobile')->nullable()->comment('Телефон мобильный');
			$table->string('email')->nullable()->comment('E-mail');
			$table->string('skype')->nullable()->comment('Skype');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - неактиване');
			$table->boolean('is_subscribe')->default(1)->comment('Подписан на рассылку');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
			$table->enum('main_communication', array('phone','email','skype'))->nullable()->comment('Основной вид связи');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contact');
	}

}
