<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBreachPddTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('breach_pdd', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('create_user_id')->nullable()->index('FK_breach_pdd_create_user_id')->comment('ID пользователя, который принял звонок');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время сохранения');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - неактивен');
			$table->integer('contractor_contact_id')->nullable()->index('FK_breach_pdd_contractor_contact_id')->comment('ID контактного лица');
			$table->string('contact_name', 50)->nullable()->comment('Имя контактного лица');
			$table->string('contact_phone')->nullable()->comment('Телефон контактного лица');
			$table->string('type')->nullable()->comment('Тип (жалоба/иное)');
			$table->dateTime('breach_datetime')->nullable()->comment('Дата и время нарушения');
			$table->string('breach_address')->nullable()->comment('Адрес нарушения');
			$table->integer('vehicle_id')->nullable()->index('FK_breach_pdd_vehicle_id')->comment('ID ТС');
			$table->integer('driver_id')->nullable()->index('FK_breach_pdd_driver_id')->comment('ID водителя');
			$table->integer('measure_id')->nullable()->index('FK_breach_pdd_breach_pdd_measure_id')->comment('ID принятой меры');
			$table->integer('file_id')->nullable()->index('FK_breach_pdd_uploaded_files_id')->comment('ID вложенного файла');
			$table->text('note', 65535)->nullable()->comment('Комментарий');
			$table->integer('manager_id')->nullable()->index('FK_breach_pdd_manager_id')->comment('ID отвветсвенного');
			$table->string('state')->nullable()->comment('Статус (выполнено/не выполнено)');
			$table->dateTime('call_datetime')->nullable()->comment('дата и время звонка');
			$table->boolean('is_took')->default(0)->comment('Звонок принят');
			$table->string('recordingfile')->nullable()->comment('Ссылка на файл записи разговора');
			$table->string('uniqid')->nullable()->unique('UN_breach_pdd_uniqid')->comment('Уникальный ID импорта');
			$table->integer('addressee')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('breach_pdd');
	}

}
