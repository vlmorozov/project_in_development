<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('parent_contractor_id')->nullable()->index('FK_contractor_contractor_id')->comment('ID родительского контрагента');
			$table->integer('type')->nullable()->comment('Тип организации (1 - Юр. лицо, 2 - Физ. лицо, 3 - ИП)');
			$table->integer('okpfo_type')->nullable()->comment('Форма собственности');
			$table->integer('org_type')->nullable()->comment('1 - клиент, 2 - поставщцик');
			$table->string('ref_scope_id')->nullable()->comment('Сфера деятельности (не используется)');
			$table->integer('client_category')->nullable()->comment('Категория клиента');
			$table->integer('manager_id')->nullable()->index('FK_contractor_manager_id')->comment('Отвественный менеджер');
			$table->integer('reclama_id')->nullable()->index('FK_contractor_reclama_id')->comment('ID рекламы');
			$table->integer('create_date')->nullable()->comment('Дата создания (не используется)');
			$table->dateTime('create_datetime')->nullable()->comment('Дата и время создания');
			$table->integer('create_user_id')->nullable()->index('FK_contractor_user_id')->comment('ID пользователя, который создал карточку');
			$table->string('ur_address_fias')->nullable()->comment('Юр адрес в фиасе');
			$table->string('post_address_fias')->nullable()->comment('Почтовый адрес в фиасе');
			$table->string('fact_address_fias')->nullable()->comment('Фактический адрес в фиасе');
			$table->string('ur_address_text')->nullable()->comment('Юридический адрес записанный');
			$table->string('post_address_text')->nullable()->comment('Почтовый адрес записанный');
			$table->string('fact_address_text')->nullable()->comment('Фактический адрес текст');
			$table->string('phone', 60)->nullable();
			$table->string('fax', 60)->nullable();
			$table->string('email', 60)->nullable();
			$table->string('url', 80)->nullable();
			$table->string('title')->nullable()->comment('Название огранизации');
			$table->string('title_full')->nullable()->comment('Полное название организации');
			$table->string('comment')->nullable();
			$table->integer('is_blocked')->nullable()->comment('статус блокирования 1.2');
			$table->string('inn')->nullable()->comment('ИНН');
			$table->string('kpp')->nullable()->comment('КПП');
			$table->integer('ic_root_id')->nullable()->comment('ID Корневого входящего запроса');
			$table->integer('main_personal_id')->nullable()->index('FK_contractor_contractor_contact_id')->comment('Основное Контактное лицо');
			$table->text('ur_address_json', 65535)->nullable()->comment('Юридический адрес в json-формате');
			$table->text('post_address_json', 65535)->nullable()->comment('Почтовый адрес в json-формате');
			$table->text('fact_address_json', 65535)->nullable()->comment('Фактический адрес в json-формате');
			$table->enum('status', array('1','2'))->nullable()->comment('1 - активен, 2 - не активен');
			$table->decimal('limit_debt', 19)->nullable()->default(0.00)->comment('Лимит задолженности (руб)');
			$table->boolean('is_problem')->default(0)->comment('Проблемный');
			$table->string('document_closing')->nullable()->comment('Список закрывающих документов');
			$table->boolean('export_fb')->nullable()->comment('Экспортировать в FB');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor');
	}

}
