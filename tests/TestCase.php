<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions, AuthenticatedRequests;

    public function setUp()
    {
        parent::setUp();

        if (
            config('database.default') !== 'mysql' ||
            config('database.connections.mysql.database') !== 'db-test'
        ) {
            dd('Для тестов используется неверный конфиг!');
        }
    }
}
