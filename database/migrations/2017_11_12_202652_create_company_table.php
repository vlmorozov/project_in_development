<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable()->comment('название организации');
			$table->string('title_full')->nullable()->comment('краткое название организации');
			$table->string('title_short')->nullable()->comment('краткое обозначение (для договоров)');
			$table->string('prefix')->nullable()->comment('префикс');
			$table->string('type')->nullable()->comment('тип (1 - юр.лицо, 2 - физ.лицо, 3 - ИП)');
			$table->integer('okpfo_type_id')->nullable()->comment('ID ОПФ');
			$table->string('inn')->nullable()->comment('ИНН');
			$table->string('kpp')->nullable()->comment('КПП');
			$table->string('ogrn')->nullable()->comment('ОГРН');
			$table->string('okpo')->nullable()->comment('ОКПО');
			$table->enum('status', array('1','2'))->nullable()->comment('1-активен, 2-неактиване');
			$table->string('ur_address_text')->nullable()->comment('Юридический адрес');
			$table->string('ur_address_fias')->nullable()->comment('Юридический адрес');
			$table->text('ur_address_json', 65535)->nullable()->comment('Юридический адрес');
			$table->string('post_address_text')->nullable()->comment('Почтовый адрес');
			$table->string('post_address_fias')->nullable()->comment('Почтовый адрес');
			$table->text('post_address_json', 65535)->nullable()->comment('Почтовый адрес');
			$table->string('fact_address_text')->nullable()->comment('Фактический адрес');
			$table->string('fact_address_fias')->nullable()->comment('Фактический адрес');
			$table->text('fact_address_json', 65535)->nullable()->comment('Фактический адрес');
			$table->string('phone')->nullable()->comment('Телефон');
			$table->string('fax')->nullable()->comment('Факс');
			$table->string('email', 50)->nullable()->comment('E-mail');
			$table->string('url')->nullable()->comment('Сайт');
			$table->text('advertising_text', 65535)->nullable()->comment('Рекламный текст');
			$table->integer('logo_file_id')->nullable()->comment('ID файла с логотипом компании');
			$table->integer('main_company_requisite_id')->nullable()->comment('ID основного счета');
			$table->boolean('for_internal_use')->default(0)->comment('Для внутреннего использования');
			$table->string('scan_stamp_file_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company');
	}

}
