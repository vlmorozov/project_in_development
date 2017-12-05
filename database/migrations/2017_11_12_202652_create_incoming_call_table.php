<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomingCallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incoming_call', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('first_incoming_call_id')->nullable()->index('FK_incoming_call_incoming_call_id')->comment('ID первого вх.запроса');
			$table->dateTime('call_date')->nullable()->comment('дата и вермя звонка');
			$table->dateTime('create_date')->nullable()->comment('дата и время сохранения');
			$table->integer('create_user_id')->nullable()->index('FK_incoming_call_user_id')->comment('ID пользователя, который принял звонок');
			$table->integer('incoming_call_source_id')->nullable()->index('FK_incoming_call_incoming_call_source_id')->comment('ID источника обращения');
			$table->text('note', 65535)->nullable()->comment('Комментарий вх. запроса');
			$table->string('interested_services')->nullable()->comment('Услуги, которыми интересовался клиент');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактивен');
			$table->integer('contractor_id')->nullable()->index('FK_incoming_call_contractor_id')->comment('Контрагент. ID');
			$table->integer('contractor_type')->nullable()->comment('Контрагент. Тип (юр, физ, ип)');
			$table->string('contractor_title')->nullable()->comment('Контрагент. Название');
			$table->boolean('is_executed')->default(0)->comment('Признак, выполнения вх.запроса');
			$table->integer('manager_id')->nullable()->index('FK_incoming_call_manager_id')->comment('ID пользователя, который является ответственным');
			$table->integer('contractor_contact_id')->nullable()->index('FK_incoming_call_contractor_contact_id')->comment('Контактное лицо. ID');
			$table->string('contractor_contact_name')->nullable()->comment('Контактное лицо. Имя');
			$table->string('contractor_contact_phone')->nullable()->index('IDX_incoming_call_contractor_contact_phone')->comment('Контактное лицо. Телефон');
			$table->string('contractor_contact_phone_dob')->nullable()->comment('Контактное лицо. Телефон доб.');
			$table->string('contractor_contact_email')->nullable()->comment('Контактное лицо. E-mail');
			$table->string('recipient')->nullable()->comment('Адрес получателя');
			$table->integer('reclama_id')->nullable()->index('FK_incoming_call_reclama_id')->comment('ID рекламы');
			$table->string('reclama_note')->nullable()->comment('Комментарий рекламы');
			$table->integer('reclama_user_id')->nullable()->index('FK_incoming_call_reclama_user_id')->comment('ID пользователя, по чей рекомендации был звонок');
			$table->integer('reclama_contractor_id')->nullable()->index('FK_incoming_call_reclama_contractor_id')->comment('ID контрагента, по чей рекомендации был звонок');
			$table->integer('contractor_delivery_id')->nullable()->index('FK_incoming_call_contractor_delivery_id')->comment('ID точки доставки');
			$table->boolean('is_took')->default(0)->comment('Звонок был принят');
			$table->string('uniqid')->nullable()->unique('UK_incoming_call_uniqid')->comment('Уникальный ID импорта');
			$table->string('address')->nullable()->comment('Адрес');
			$table->float('lat', 9, 6)->nullable()->comment('Координаты адреса');
			$table->float('lng', 9, 6)->nullable()->comment('Координаты адреса');
			$table->string('recordingfile')->nullable()->comment('Ссылка на файл записи разговора');
			$table->integer('event_tracker_id')->nullable()->index('FK_incoming_call_event_tracker_id')->comment('ID трекера события');
			$table->string('asterisk_channel')->nullable()->comment('Канал связи (в Asterisk)');
			$table->integer('duration')->nullable()->comment('Продолжительность звонка (сек)');
			$table->integer('next_incoming_call_id')->nullable()->index('FK_incoming_call_next_incoming_call_id')->comment('ID входящего, который был следующим (при переводе звонка)');
			$table->boolean('is_first')->nullable()->comment('Первый вх. запрос');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('incoming_call');
	}

}
