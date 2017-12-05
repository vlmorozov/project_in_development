<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyPersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_person', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id');
			$table->integer('user_id')->index('FK_company_person_user_id')->comment('ID сотрудника');
			$table->enum('type', array('chief','booker'))->comment('Позиция');
			$table->string('fio_ip')->nullable()->comment('ФИО (и.п.)');
			$table->string('fio_rp')->nullable()->comment('ФИО (р.п.)');
			$table->string('post_ip')->nullable()->comment('Должность (и.п.)');
			$table->string('post_rp')->nullable()->comment('Должность (р.п.)');
			$table->string('reason')->nullable()->comment('На основании');
			$table->date('date_from')->nullable()->comment('Период действия с');
			$table->date('date_to')->nullable()->comment('Период действия по');
			$table->string('title')->nullable()->comment('Рабочее наименование');
			$table->integer('scan_file_id')->nullable()->comment('ID файла скана подписи');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_person');
	}

}
