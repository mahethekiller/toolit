<?php

use App\Models\User;
use App\Models\Arti\Deity;
use App\Models\Arti\Aarti;
use App\Models\Arti\GalleryImage;
use App\Models\Arti\ArtiUser;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->adminRole = Role::firstOrCreate(['name' => 'admin']);
});

test('guest users are redirected to login', function () {
    $this->getJson(route('admin.arti.deities.index'))->assertStatus(401);
});

test('non admin users receive forbidden response', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.arti.deities.index'))
        ->assertStatus(403);
});

test('admin can view deities list', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $this->actingAs($admin)
        ->get(route('admin.arti.deities.index'))
        ->assertStatus(200);
});

test('admin can create deity', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $response = $this->actingAs($admin)
        ->post(route('admin.arti.deities.store'), [
            'name' => 'Test Deity',
            'description' => 'Test Description',
            'image_url' => 'https://example.com/image.jpg',
        ]);

    $response->assertRedirect(route('admin.arti.deities.index'));
    $this->assertDatabaseHas('arti_deities', ['name' => 'Test Deity']);
});

test('admin can create aarti with lyrics JSON', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $deity = Deity::create([
        'name' => 'Temp Deity',
        'description' => 'Desc',
        'image_url' => 'https://example.com/img.jpg'
    ]);

    $response = $this->actingAs($admin)
        ->post(route('admin.arti.aartis.store'), [
            'deity_id' => $deity->id,
            'title' => 'Test Title',
            'subtitle' => 'Test Subtitle',
            'category' => 'Popular',
            'duration' => '02:30',
            'audio_url' => 'https://example.com/audio.mp3',
            'video_url' => 'y25k2S9n_4Y',
            'lyrics' => json_encode([
                ['timestamp' => 0, 'text' => 'Line 1'],
                ['timestamp' => 10, 'text' => 'Line 2']
            ])
        ]);

    $response->assertRedirect(route('admin.arti.aartis.index'));
    $this->assertDatabaseHas('arti_aartis', ['title' => 'Test Title']);
});

test('admin can delete deity', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $deity = Deity::create([
        'name' => 'Deity To Delete',
        'description' => 'Desc',
        'image_url' => 'https://example.com/img.jpg'
    ]);

    $response = $this->actingAs($admin)
        ->delete(route('admin.arti.deities.destroy', $deity->id));

    $response->assertRedirect(route('admin.arti.deities.index'));
    $this->assertDatabaseMissing('arti_deities', ['id' => $deity->id]);
});

test('admin can auto-generate API token for an app user', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $appUser = ArtiUser::create([
        'name' => 'API User',
        'email' => 'api_user@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->actingAs($admin)
        ->post(route('admin.arti.users.generate-token', $appUser->id));

    $response->assertRedirect(route('admin.arti.users.show', $appUser->id));
    $response->assertSessionHas('generated_token');
});

test('admin can upload deity image', function () {
    Storage::fake('public');
    
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $file = Illuminate\Http\UploadedFile::fake()->image('ganesha.jpg');

    $response = $this->actingAs($admin)
        ->post(route('admin.arti.deities.store'), [
            'name' => 'Ganesha Upload',
            'description' => 'Lord Ganesha Description',
            'image_file' => $file,
        ]);

    $response->assertRedirect(route('admin.arti.deities.index'));
    
    $deity = Deity::where('name', 'Ganesha Upload')->first();
    $this->assertNotNull($deity);
    $this->assertStringStartsWith('http://', $deity->image_url);
    $this->assertStringContainsString('/storage/uploads/deities/', $deity->image_url);
});

test('admin can view token generator page', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $this->actingAs($admin)
        ->get(route('admin.arti.users.tokens'))
        ->assertStatus(200);
});

test('admin can generate token from token generator page', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $appUser = ArtiUser::create([
        'name' => 'Generator User',
        'email' => 'gen_user@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->actingAs($admin)
        ->post(route('admin.arti.users.generate-token-generator'), [
            'user_id' => $appUser->id,
        ]);

    $response->assertRedirect(route('admin.arti.users.tokens'));
    $response->assertSessionHas('generated_token');
    $response->assertSessionHas('selected_user_id', $appUser->id);
});

test('admin can view api documentation page', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $this->actingAs($admin)
        ->get(route('admin.arti.users.docs'))
        ->assertStatus(200);
});
