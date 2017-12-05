<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_event', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->enum('type_event', array('outgoing','active_sale','asterisk'))->default('outgoing')->comment('Тип события (исх. событие, активная продажа)');
			$table->string('type')->index('FK_contact_event_contact_event_type_name')->comment('Тип события');
			$table->string('state')->index('FK_contact_event_contact_event_state_name')->comment('Состояние события');
			$table->enum('status', array('1','2'))->default('1');
			$table->date('date_plan')->nullable()->comment('Плановая дата (не используется)');
			$table->dateTime('datetime_plan')->nullable()->comment('Плановая дата и время');
			$table->dateTime('date_execute')->nullable()->comment('Дата выполнения');
			$table->integer('contractor_id')->nullable()->comment('ID контрагента');
			$table->string('contractor_title')->nullable()->comment('Название контрагента');
			$table->integer('contractor_contact_id')->nullable()->index('FK_contact_event_contractor_contact_id')->comment('ID контактного лица');
			$table->string('contractor_contact_name')->nullable()->comment('Имя контактного лица');
			$table->string('phone', 50)->comment('Телефон');
			$table->integer('create_user_id')->comment('ID пользователя, создавшего событие');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и вермя создания');
			$table->integer('user_id')->comment('ID сотрудника, задействованного в событии');
			$table->string('subject')->nullable()->comment('Тема (не используется)');
			$table->integer('event_tracker_id')->nullable()->index('FK_contact_event_event_tracker_id')->comment('ID трекера события');
			$table->text('content', 65535)->nullable()->comment('Содержание');
			$table->string('result')->nullable()->comment('Результат');
			$table->string('email', 50)->comment('E-mail');
			$table->string('recordingfile')->nullable()->comment('Ссылка на файл записи разговора');
			$table->integer('file_id')->nullable()->comment('ID файла');
			$table->string('post_address')->nullable()->comment('Почтовый адрес');
			$table->integer('incoming_call_id')->nullable()->index('FK_contact_event_incoming_call_id')->comment('ID вх запроса, созданного из исх.');
			$table->string('uniqid')->nullable()->comment('Уникальный ID импорта');
			$table->integer('duration')->nullable()->comment('Продолжительность звонка (сек)');
			$table->boolean('from_kis')->nullable()->comment('Звонок инициирован из kis');
			$table->dateTime('call_datetime')->nullable()->comment('Дата и время звонка');
			$table->index(['state','contractor_id'], 'IDX_contact_event_state_contractor_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_event');
	}

}
