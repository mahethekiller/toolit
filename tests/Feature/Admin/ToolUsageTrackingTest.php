<?php

use App\Models\Tool;
use App\Models\ToolUsage;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->adminRole = Role::firstOrCreate(['name' => 'admin']);
    
    // Seed basic tool
    $this->tool = Tool::firstOrCreate(
        ['route_name' => 'tools.case-converter'],
        [
            'name' => 'Case Converter',
            'url' => 'https://www.onlinetxttools.com/tools/case-converter',
            'active' => true,
            'description' => 'Test converter'
        ]
    );
});

test('tool visit is logged by middleware', function () {
    // Hit the case converter page
    $this->get('/tools/case-converter')->assertStatus(200);

    // Verify database logging
    $this->assertDatabaseCount('tool_usages', 1);

    $usage = ToolUsage::first();
    expect($usage)->not->toBeNull();
    expect($usage->route_name)->toBe('tools.case-converter');
    expect($usage->action)->toBe('view');
});

test('admin user is not tracked', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    // Hit the page acting as admin
    $this->actingAs($admin)->get('/tools/case-converter')->assertStatus(200);

    // No tracking entry should exist
    $this->assertDatabaseCount('tool_usages', 0);
});

test('non-admin user is forbidden from accessing analytics dashboard', function () {
    $user = User::factory()->create();

    // Guest redirect
    $this->get(route('admin.tool-analytics.index'))->assertRedirect('/login');

    // Non-admin forbidden
    $this->actingAs($user)->get(route('admin.tool-analytics.index'))->assertStatus(403);
});

test('admin can access analytics dashboard', function () {
    $admin = User::factory()->create();
    $admin->assignRole($this->adminRole);

    $response = $this->actingAs($admin)->get(route('admin.tool-analytics.index'));
    
    $response->assertStatus(200);
    $response->assertSee('Tool Usage Analytics');
});
