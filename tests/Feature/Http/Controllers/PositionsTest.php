<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\Position;
use App\Models\Status;
use Tests\TestCase;


class PositionsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }
    
    /**
     * Должности. Проверка limit
     * @test
     */
    public function positions_ok_limit()
    {
        factory(Position::class, 2)->create();

        $response = $this->json('GET', route('positions.index', [
            'limit' => 1
        ]));

        $response->assertStatus(200);
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
    }

    /**
     * @test
     */
    public function positions_filter_by_title()
    {
        $position = factory(Position::class)->create([
            'title' => 'Слесарь'
        ]);
        factory(Position::class, 2)->create();

        $search = 'Слес';
        $response = $this->json('GET', route('positions.index', [
            'title' => $search,
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($position->id, array_get($json, '0.id'));
        $this->assertContains($search, array_get($json, '0.title'));
    }

    /**
     * Активные
     * @test
     */
    public function positions_filter_status_active()
    {
        $position = factory(Position::class)->create([
            'status' => Status::ACTIVE
        ]);
        factory(Position::class)->create([
            'status' => Status::INACTIVE
        ]);
        factory(Position::class)->create([
            'status' => Status::INACTIVE
        ]);

        $response = $this->json('GET', route('positions.index', [
            'status' => Status::ACTIVE,
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($position->id, array_get($json, '0.id'));
        $this->assertEquals(Status::ACTIVE, array_get($json, '0.status'));
    }

    /**
     * Неактивные
     * @test
     */
    public function positions_filter_status_inactive()
    {
        factory(Position::class)->create([
            'status' => Status::ACTIVE
        ]);
        factory(Position::class)->create([
            'status' => Status::ACTIVE
        ]);
        $position = factory(Position::class)->create([
            'status' => Status::INACTIVE
        ]);

        $response = $this->json('GET', route('positions.index', [
            'status' => Status::INACTIVE,
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($position->id, array_get($json, '0.id'));
        $this->assertEquals(Status::INACTIVE, array_get($json, '0.status'));
    }

    /**
     * Поиск по категории
     * @test
     */
    public function positions_presenter_grid_filter_by_category_ok()
    {
        $position = factory(Position::class)->states('position_category')->create();
        factory(Position::class, 2)->states('position_category')->create();

        $response = $this->json('GET', route('positions.index', [
            'position_category_id' => $position->category->id,
            'presenter' => 'grid'
        ]));

        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($position->id, array_get($json, '0.id'));
        $this->assertEquals($position->category->id, array_get($json, '0.category.id'));
    }
}
