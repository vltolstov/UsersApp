<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_user_can_register(): void
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('login_process'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $response->assertRedirectToRoute('users.edit', $user->id);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('logout'));
        $response->assertRedirectToRoute('index');
    }

    public function test_user_has_access_to_accout_page(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('users.edit', $user->id));
        $response->assertOk();
    }

    public function test_user_can_edit_name(): void
    {
        $user = User::factory()->create();
        $user->update([
            'name' => 'UserNameEdited',
        ]);

        $this->assertEquals('UserNameEdited', $user->name);
    }

    public function test_user_can_request_new_password(): void
    {
        $user = User::factory()->create([
            'email' => 'test@test',
        ]);
        $response = $this->post(route('forgot-password-process'), ['email' => $user->email]);
        $response->assertRedirectToRoute('login');
    }

    public function test_user_can_delete_himself(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->delete(route('users.destroy', $user->id));
        $response->assertOk();
        $this->assertModelMissing($user);
    }
}
