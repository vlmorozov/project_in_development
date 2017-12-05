<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_contact', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->index('FK_company_contact_company_id')->comment('ID организации');
			$table->string('ur_address_text')->nullable()->comment('Юридический адрес');
			$table->string('ur_address_fias')->nullable()->comment('Юридический адрес');
			$table->text('ur_address_json', 65535)->nullable()->comment('Юридический адрес в json');
			$table->string('post_address_text')->nullable()->comment('Почтовый адрес');
			$table->string('post_address_fias')->nullable()->comment('Почтовый адрес');
			$table->text('post_address_json', 65535)->nullable()->comment('Почтовый адрес в json');
			$table->string('fact_address_text')->nullable()->comment('Фактический адрес');
			$table->string('fact_address_fias')->nullable()->comment('Фактический адрес');
			$table->text('fact_address_json', 65535)->nullable()->comment('Фактический адрес в json');
			$table->string('phone')->nullable()->comment('Телефон');
			$table->string('fax')->nullable()->comment('Факс');
			$table->string('email')->nullable()->comment('E-mail');
			$table->string('url')->nullable()->comment('Сайт');
			$table->date('date_from')->comment('Дата с');
			$table->date('date_to')->nullable()->comment('Дата по');
			$table->integer('status')->nullable()->comment('Статус активности');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_contact');
	}

}
