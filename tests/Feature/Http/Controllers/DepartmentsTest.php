<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\Department;
use Tests\TestCase;


class DepartmentsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }
    
    /**
     * @test
     */
    public function departments_ok_limit()
    {
        factory(Department::class, 2)->states('company')->create();

        $response = $this->json('GET', route('departments.index', [
            'limit' => 1
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
    }

    /**
     * @test
     */
    public function departments_filter_by_title()
    {
        $department = factory(Department::class)->states('company')->create([
            'title' => 'Отдел разоаботки КИС'
        ]);
        factory(Department::class, 2)->states('company')->create();

        $search = 'КИС';
        $response = $this->json('GET', route('departments.index', [
            'title' => $search,
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
        $this->assertEquals($department->id, array_get($json, '0.id'));
        $this->assertContains($search, array_get($json, '0.title'));
    }
}
