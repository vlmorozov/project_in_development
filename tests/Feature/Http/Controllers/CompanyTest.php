<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\Company;
use Tests\TestCase;


class CompanyTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loginSimpleUser();
    }

    /**
     * Проверка limit
     *
     * @test
     */
    public function company_ok_limit()
    {
        factory(Company::class, 5)->create();

        $response = $this->json('GET', route('companies.index', [
            'limit' => 1
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertCount(1, $json);
    }

    /**
     * @test
     */
    public function company_filter_by_title()
    {
        factory(Company::class)->create([
            'title' => 'Автостройград'
        ]);
        factory(Company::class, 2)->create();

        $search = 'строй';
        $response = $this->json('GET', route('companies.index', [
            'title' => $search,
        ]));

        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertContains($search, array_get($json, '0.title'));
    }
}
