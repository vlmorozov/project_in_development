<?php


namespace Tests\Feature\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use JWTAuth;
use Tests\TestCase;


class AuthTest extends TestCase
{
    /**
     * Авторизация проходит
     *
     * @test
     */
    public function auth_ok()
    {
        // Создаём пользователя
        $login = 'test';
        $password = '12345678';
        /** @var User $user */
        $user = factory(User::class)->create([
            'login' => $login,
            'password' => $password,
        ]);

        // Отправляем запрос на авторизацию
        $response = $this->postJson(route('auth.login'), compact('login', 'password'));

        // Проверяем ответ
        $response->assertSuccessful();
        $json = $response->json()['data'];
        $this->assertEquals($user->id, array_get($json, 'user.id'));
        $response->assertHeader('Api-Token');
    }


    /**
     * Сервер отправляет заголовок Api-Token с новым токеном, когда токену осталось жить меньше 1/4 времени
     *
     * @test
     */
    public function it_jwt_update_header_exists()
    {
        $user = factory(User::class)->create();
        $token = JWTAuth::fromUser($user);

        // Отправляем запрос на информацию о пользователе
        $response = $this->getJson(route('users.auth'), ['Authorization' => "Bearer {$token}"]);

        // Проверяем, что заголовка нет
        $this->assertNull($response->headers->get('Api-Token'));

        // Сдвигаем время
        Carbon::setTestNow(Carbon::now()->addMinutes(intval(config('jwt.ttl') / 4 * 3 + 1)));

        // Отправляем запрос на информацию о пользователе
        $response = $this->getJson(
            route('users.auth'),
            [
                'Authorization' => "Bearer {$token}",
            ]
        );

        // Проверяем, что заголовок пришёл

        $response->assertHeader('Api-Token');
    }
}
