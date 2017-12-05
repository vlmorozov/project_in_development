<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_contact_id')->nullable()->unique('UK_user_contractor_contact_id')->comment('ID контактного лица контрагента');
			$table->string('name', 50)->comment('ФИО сотрудника');
			$table->string('login')->comment('Логин');
			$table->string('password')->comment('Пароль');
			$table->string('personnel_number')->nullable()->comment('Табельный номер');
			$table->enum('status', array('1','2'))->nullable()->default('1')->comment('1-активен, 2-неактиване');
			$table->integer('company_id')->nullable()->index('FK_user_company_id')->comment('ID компании');
			$table->integer('company_unit_id')->nullable()->index('FK_user_company_unit_id')->comment('ID подразделения компании');
			$table->integer('position_id')->nullable()->index('FK_user_position_id')->comment('ID должности');
			$table->date('date_birth')->nullable()->comment('Дата рождения');
			$table->date('date_hire')->nullable()->comment('Дата приема на работу');
			$table->date('date_dismissal')->nullable()->comment('Дата увольнения');
			$table->string('phone_work')->nullable()->comment('Телефон рабочий');
			$table->string('phone_work_add')->nullable()->comment('Телефон рабочий доб.');
			$table->string('phone_add')->nullable()->comment('Телефон доб. 2');
			$table->string('phone_mobile')->nullable()->comment('Телефон мобильный');
			$table->string('phone_home')->nullable()->comment('Телефон домашний');
			$table->string('email_personal')->nullable()->comment('Email личный');
			$table->string('email_work')->nullable()->comment('Email рабочий');
			$table->boolean('import_1c')->default(0)->comment('Импортирован из 1С');
			$table->boolean('can_auth')->default(0)->comment('Может авторизоваться через веб');
			$table->boolean('can_auth_tab')->default(0)->comment('Может авторизоваться с планшета');
			$table->boolean('can_auth_report')->default(0)->comment('Может авторизоваться в системе отчетов');
			$table->boolean('can_auth_lk')->nullable()->default(0)->comment('Может авторизоваться в личном кабинете');
			$table->boolean('can_auth_mlk')->nullable()->default(0)->comment('Может авторизоваться в мобильном личном кабинете');
			$table->boolean('is_admin')->default(0)->comment('Администратор');
			$table->text('mail_signature', 65535)->nullable()->comment('Подпись при отправке писем');
			$table->string('forgot_code')->nullable()->unique('UK_user_forgot_code')->comment('Код для восстановления пароля');
			$table->boolean('is_load_call')->default(0)->comment('Загружать звонки');
			$table->boolean('can_access_child')->default(0);
			$table->enum('source', array('УУ','РУ'))->nullable()->comment('Признак учета');
			$table->string('password2')->nullable()->comment('Пароль для расшифровки');
			$table->unique(['personnel_number','company_id'], 'UK_user_personnel_number');
			$table->unique(['name','date_birth','company_id'], 'UK_user_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
