<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\PositionCategory;
use Tests\TestCase;


class PositionsCategoriesTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }

    /**
     * @test
     */
    public function position_categories_ok_limit()
    {
        factory(PositionCategory::class, 2)->create();

        $response = $this->json('GET', route('position-categories.index', [
            'limit' => 1
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
    }

    /**
     * @test
     */
    public function position_categories_filter_by_title()
    {
        $positionCategory = factory(PositionCategory::class)->create([
            'title' => 'Категория'
        ]);
        factory(PositionCategory::class, 2)->create();

        $search = 'Категория';
        $response = $this->json('GET', route('position-categories.index', [
            'title' => $search,
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($positionCategory->id, array_get($json, '0.id'));
        $this->assertContains($search, array_get($json, '0.title'));
    }
}
