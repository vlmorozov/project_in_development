<?php

namespace Tests\Feature\Http\Controllers;


use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Collection;
use Tests\TestCase;


class LogsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }


    /**
     * При отсутствии фильтров возвращаются все логи
     *
     * @test
     */
    public function filters_ok_without_params()
    {
        /** @var Log[]|Collection $logs */
        $logs = factory(Log::class, 3)->create();

        $response = $this->getJson(route('logs.index'));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount($logs->count(), $json);
        $this->assertEquals(
            collect($json)->pluck('id')->sort()->values()->toArray(),
            $logs->pluck('id')->sort()->values()->toArray(),
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * limit и offset работают
     *
     * @test
     */
    public function filters_ok_limit_offset()
    {
        /** @var Log[]|Collection $logs */
        $logs = factory(Log::class, 3)->create();

        $response = $this->getJson(route('logs.index', [
            'limit'  => 1,
            'offset' => 1,
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $logs[1]->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по operation_type работает
     *
     * @test
     */
    public function filters_ok_by_operation_type()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['operation_type' => 'update']);
        factory(Log::class)->create(['operation_type' => 'create']);
        factory(Log::class)->create(['operation_type' => 'delete']);

        $response = $this->getJson(route('logs.index', [
            'operation_type' => 'update',
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по user_id работает
     *
     * @test
     */
    public function filters_ok_by_user_id()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->states('user')->create();
        factory(Log::class)->states('user')->create();
        factory(Log::class)->states('user')->create();

        $response = $this->getJson(route('logs.index', [
            'user_id' => $expected->user_id,
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     */
    public function filters_ok_by_object_type()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['object_type' => 'incoming_call']);
        factory(Log::class)->create(['object_type' => 'user_login']);
        factory(Log::class)->create(['object_type' => 'contact_event']);

        $response = $this->getJson(route('logs.index', [
            'object_type' => $expected->object_type,
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     */
    public function filters_ok_by_object_id()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['object_id' => 2]);
        factory(Log::class)->create(['object_id' => 1]);
        factory(Log::class)->create(['object_id' => 3]);

        $response = $this->getJson(route('logs.index', [
            'object_id' => $expected->object_id,
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     */
    public function filters_ok_by_operation_data()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['operation_data' => ['field2' => 1]]);
        factory(Log::class)->create(['operation_data' => ['field1' => 1]]);
        factory(Log::class)->create(['operation_data' => ['field3' => 1]]);

        $response = $this->getJson(route('logs.index', [
            'object_field' => 'field2',
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     */
    public function filters_ok_by_operation_date_from()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['operation_date' => '2017-01-10']);
        factory(Log::class)->create(['operation_date' => '2017-01-01']);
        factory(Log::class)->create(['operation_date' => '2017-01-05']);

        $response = $this->getJson(route('logs.index', [
            'operation_date_from' => '2017-01-07',
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     */
    public function filters_ok_by_operation_date_to()
    {
        /** @var Log $expected */
        $expected = factory(Log::class)->create(['operation_date' => '2017-01-01']);
        factory(Log::class)->create(['operation_date' => '2017-01-10']);
        factory(Log::class)->create(['operation_date' => '2017-01-05']);

        $response = $this->getJson(route('logs.index', [
            'operation_date_to' => '2017-01-04',
        ]));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals(
            $json[0]['id'],
            $expected->id,
            'Логи отфильтровались некорректно'
        );
    }


    /**
     * Фильтр по object_type работает
     *
     * @test
     * @dataProvider validation_provider
     *
     * @param array $params Параметры запроса
     * @param array $errors Ожидаемые ключи ошибок
     */
    public function validation($params, $errors = null)
    {
        $response = $this->getJson(route('logs.index', $params));
        $errors = $errors ?? array_keys($params);

        $response->assertStatus(422);
        $json = $response->json();
        $this->assertCount(count($errors), $json['errors']);
        $this->assertEquals(
            $errors,
            array_keys($json['errors']),
            'Логи отфильтровались некорректно'
        );
    }


    public function validation_provider()
    {
        return [
            'Некорректный operation_type'                  => [['operation_type' => 'wrong']],
            'Несуществующий пользователь'                  => [['user_id' => 999]],
            'object_id - не число'                         => [['object_id' => 'asd']],
            'operation_date_from - не дата'                => [['operation_date_from' => 'asd']],
            'operation_date_to - не дата'                  => [['operation_date_to' => 'asd']],
            'limit больше максимально возможного значения' => [['limit' => 101]],
            'limit - не число'                             => [['limit' => 'asd']],
            'offset - не число'                            => [['offset' => 'asd']],
        ];
    }


    /**
     * API для просмотра лога возвращает корректный лог
     *
     * @test
     */
    public function show_returns_correct_log()
    {
        /** @var Log[]|Collection $logs */
        $logs = factory(Log::class, 3)->create(['user_id' => null]);

        $log = $logs[1];

        $response = $this->getJson(route('logs.show', $log));

        $response->isOk();
        $json = $response->json()['data'];
        $this->assertEquals($log->id, $json['id']);
    }


    /**
     * Типы объектов фильтруются
     *
     * @test
     */
    public function object_types_filter_by_name_ok()
    {
        $title = 'breach_pd';
        $response = $this->getJson(route('logs.object-types', [
            'title' => $title
        ]));

        $json = $response->json()['data'];
        $this->assertCount(2, $json);
        foreach ($json as $item) {
            $this->assertContains($title, $item['title']);
        }
    }

    /**
     * Логи недоступны для неавторизованного пользователя
     *
     * @test
     */
    public function not_logged_user_returns_error()
    {
        $this->logout();
        $response = $this->getJson(route('logs.index'));
        $response->assertStatus(403);
    }
}
