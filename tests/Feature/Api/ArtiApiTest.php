<?php

use App\Models\Arti\ArtiUser;
use App\Models\Arti\Deity;
use App\Models\Arti\Aarti;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    // Seed initial deities and aartis if database is empty
    if (Deity::count() === 0) {
        $this->artisan('db:seed');
    }
});

test('arti user can register via api', function () {
    $response = $this->postJson('/api/arti/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
        'gotra' => 'Kashyap',
        'rashi' => 'Aries',
    ]);

    $response->assertStatus(201);
    $response->assertJsonStructure([
        'status', 'message', 'token', 'user' => ['id', 'name', 'email', 'gotra', 'rashi']
    ]);

    $this->assertDatabaseHas('arti_users', [
        'email' => 'john@example.com',
        'gotra' => 'Kashyap',
        'rashi' => 'Aries',
    ]);
});

test('arti user can login via api', function () {
    $user = ArtiUser::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->postJson('/api/arti/login', [
        'email' => 'jane@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status', 'message', 'token', 'user'
    ]);
});

test('can retrieve deities and aartis', function () {
    $response = $this->getJson('/api/arti/deities');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status', 'data' => [
            '*' => ['id', 'name', 'description', 'image_url']
        ]
    ]);

    $response = $this->getJson('/api/arti/aartis');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        'status', 'data' => [
            '*' => ['id', 'title', 'subtitle', 'category', 'duration', 'audio_url', 'video_url', 'lyrics']
        ]
    ]);
});

test('protected endpoints require authentication', function () {
    $this->getJson('/api/arti/profile')->assertStatus(401);
    $this->getJson('/api/arti/favorites')->assertStatus(401);
    $this->getJson('/api/arti/reminders')->assertStatus(401);
});

test('authenticated user can access profile and update it', function () {
    $user = ArtiUser::create([
        'name' => 'Alice',
        'email' => 'alice@example.com',
        'password' => Hash::make('password123'),
    ]);

    $token = $user->createToken('test')->plainTextToken;

    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/arti/profile');

    $response->assertStatus(200);
    $response->assertJsonPath('data.name', 'Alice');

    // Update profile
    $updateResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->putJson('/api/arti/profile', [
            'name' => 'Alice Smith',
            'gotra' => 'Vatsa'
        ]);

    $updateResponse->assertStatus(200);
    $updateResponse->assertJsonPath('data.name', 'Alice Smith');
    $updateResponse->assertJsonPath('data.gotra', 'Vatsa');
});

test('authenticated user can toggle favorites', function () {
    $user = ArtiUser::create([
        'name' => 'Bob',
        'email' => 'bob@example.com',
        'password' => Hash::make('password123'),
    ]);

    $token = $user->createToken('test')->plainTextToken;
    $aarti = Aarti::first();

    // Toggle on
    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->postJson('/api/arti/favorites/toggle', [
            'aarti_id' => $aarti->id
        ]);

    $response->assertStatus(200);
    $response->assertJsonPath('data.favorited', true);

    $this->assertDatabaseHas('arti_favorites', [
        'user_id' => $user->id,
        'aarti_id' => $aarti->id
    ]);

    // List favorites
    $listResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/arti/favorites');

    $listResponse->assertStatus(200);
    $listResponse->assertJsonCount(1, 'data');

    // Toggle off
    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->postJson('/api/arti/favorites/toggle', [
            'aarti_id' => $aarti->id
        ]);

    $response->assertStatus(200);
    $response->assertJsonPath('data.favorited', false);

    $this->assertDatabaseMissing('arti_favorites', [
        'user_id' => $user->id,
        'aarti_id' => $aarti->id
    ]);
});

test('authenticated user can manage reminders', function () {
    $user = ArtiUser::create([
        'name' => 'Charlie',
        'email' => 'charlie@example.com',
        'password' => Hash::make('password123'),
    ]);

    $token = $user->createToken('test')->plainTextToken;

    // Create reminder
    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->postJson('/api/arti/reminders', [
            'title' => 'Morning Prayer',
            'time' => '07:30:00',
        ]);

    $response->assertStatus(201);
    $reminderId = $response->json('data.id');

    $this->assertDatabaseHas('arti_reminders', [
        'id' => $reminderId,
        'title' => 'Morning Prayer',
        'time' => '07:30:00',
    ]);

    // List reminders
    $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/arti/reminders')
        ->assertStatus(200)
        ->assertJsonCount(1, 'data');

    // Update reminder
    $this->withHeader('Authorization', 'Bearer ' . $token)
        ->putJson('/api/arti/reminders/' . $reminderId, [
            'title' => 'Morning Aarti',
            'is_enabled' => false,
        ])
        ->assertStatus(200)
        ->assertJsonPath('data.title', 'Morning Aarti')
        ->assertJsonPath('data.is_enabled', false);

    // Delete reminder
    $this->withHeader('Authorization', 'Bearer ' . $token)
        ->deleteJson('/api/arti/reminders/' . $reminderId)
        ->assertStatus(200);

    $this->assertDatabaseMissing('arti_reminders', [
        'id' => $reminderId
    ]);
});
