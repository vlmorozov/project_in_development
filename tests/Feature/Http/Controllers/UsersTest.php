<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\Status;
use App\Models\User;
use Tests\TestCase;


class UsersTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }


    /**
     * Проверка поиска по фильтру "ПОИСК"
     *
     * @test
     */
    public function users_filter_search()
    {
        // Пользователь, которого будем искать
        /** @var User $user */
        $user = factory(User::class)->states('company')->create([
            'name' => 'Петр Ильич Чайковский'
        ]);
        // 2 рандомных пользователя
        factory(User::class, 2)->states('company')->create();

        

        $response = $this->getJson(route('users.index', [
            'search' => 'Петр Ильич Чайковский',
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($user->id, array_get($json, '0.id'));
    }

    /**
     * Активные сорудники
     * @test
     */
    public function users_filter_status_active()
    {
        $user = factory(User::class)->states('company')->create([
            'name' => 'Иванов Иван',
            'status' => Status::ACTIVE
        ]);        
        factory(User::class)->states('company')->create([
            'name' => 'Петров Петр',
            'status' => Status::INACTIVE
        ]);        
        factory(User::class)->states('company')->create([
            'name' => 'Сидоров Сидор',
            'status' => Status::INACTIVE
        ]);

        $response = $this->getJson(route('users.index', [
            'status' => Status::ACTIVE,
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($user->id, array_get($json, '0.id'));
        $this->assertEquals(Status::ACTIVE, array_get($json, '0.status'));
    }

    /**
     * Неактивные сотрудники
     * @test
     */
    public function users_filter_status_inactive()
    {
        factory(User::class)->states('company')->create([
            'name' => 'Иванов Иван',
            'status' => Status::ACTIVE
        ]);
        factory(User::class)->states('company')->create([
            'name' => 'Петров Петр',
            'status' => Status::ACTIVE
        ]);
        $user = factory(User::class)->states('company')->create([
            'name' => 'Сидоров Сидор',
            'status' => Status::INACTIVE
        ]);

        $response = $this->getJson(route('users.index', [
            'status' => Status::INACTIVE,
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($user->id, array_get($json, '0.id'));
        $this->assertEquals(Status::INACTIVE, array_get($json, '0.status'));
    }

    /**
     * Поиск по компании
     * @test
     */
    public function users_filter_company_ok()
    {
        /** @var User $user */
        $user = factory(User::class)->states('company')->create();
        factory(User::class)->states('company')->create();

        $response = $this->getJson(route('users.index', [
            'company_id' => $user->company_id,
            'presenter' => 'grid'
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($user->id, array_get($json, '0.id'));
    }

    /**
     * @test
     */
    public function users_show()
    {
        $user = factory(User::class)->create();

        $response = $this->getJson(route('users.show', $user));

        $json = $response->json()['data'];
        $this->assertEquals($user->id, $json['id']);
    }

    /**
     * @test
     */
    public function users_create()
    {
        $data = [
            'name' => 'Иванов Иван'
        ];

        $response = $this->postJson(route('users.store', $data));

        $json = $response->json()['data'];
        $this->assertEquals($data['name'], $json['name']);
        $this->assertArrayHasKey('id', $json);
        $this->assertNotEmpty($json['id']);
    }
    
    /**
     * @test
     */
    public function users_create_set_status()
    {
        $data = [
            'name' => 'Иванов Иван',
            'status' => 1
        ];

        $response = $this->postJson(route('users.store', $data));

        $json = $response->json()['data'];
        $this->assertArrayHasKey('id', $json);
        $this->assertNotEmpty($json['id']);
        $this->assertEquals($data['name'], $json['name']);
        $this->assertEquals($data['status'], $json['status'], print_r($json, 1));
    }    
    
    /**
     * @test
     */
    public function users_create_set_email()
    {
        $data = [
            'name' => 'Иванов Иван',
            'email_work' => "test@tes.dev"
        ];

        $response = $this->postJson(route('users.store', $data));

        $json = $response->json()['data'];
        $this->assertArrayHasKey('id', $json);
        $this->assertNotEmpty($json['id']);
        $this->assertEquals($data['name'], $json['name']);
        $this->assertEquals($data['email_work'], $json['email_work']);
    }

    /**
     * @test
     */
    public function users_update()
    {
        $user = factory(User::class)->states('company')->create([
            'name' => 'Иванов Иван'
        ]);

        $newName = 'Петров Петр';
        $response = $this->putJson(route('users.update', [
            'id' => $user->id,
            'name' => $newName
        ]));

        $json = $response->json()['data'];
        $this->assertEquals($newName, $json['name']);
        $this->assertEquals($user->id, $json['id']);
    }
}
