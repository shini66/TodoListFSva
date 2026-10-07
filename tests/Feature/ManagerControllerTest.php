<?php

use App\Models\Manager;
use App\Models\Task;
use App\Models\User;

test('authenticated users can load the managers index with actions', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Test Manager',
        'email' => 'manager@example.com',
    ]);

    Task::create([
        'title' => 'Test Task',
        'description' => 'Test description',
        'completed' => false,
        'manager_id' => $manager->id,
    ]);

    $this->get(route('managers.index'))
        ->assertOk()
        ->assertSee('Test Manager')
        ->assertSee('1 tareas asignadas')
        ->assertSee(route('managers.edit', $manager))
        ->assertSee(route('managers.destroy', $manager))
        ->assertSee('Editar')
        ->assertSee('Eliminar');
});

test('authenticated users can update a manager', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Old Manager',
        'email' => 'old@example.com',
    ]);

    $this->put(route('managers.update', $manager), [
        'name' => 'Updated Manager',
        'email' => 'updated@example.com',
    ])->assertRedirect(route('managers.index', absolute: false));

    expect($manager->fresh())
        ->name->toBe('Updated Manager')
        ->email->toBe('updated@example.com');
});

test('authenticated users can delete a manager', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Delete Manager',
        'email' => 'delete@example.com',
    ]);

    $this->delete(route('managers.destroy', $manager))
        ->assertRedirect(route('managers.index', absolute: false));

    $this->assertModelMissing($manager);
});
