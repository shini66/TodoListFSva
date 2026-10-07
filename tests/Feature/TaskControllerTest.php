<?php

use App\Models\Manager;
use App\Models\Task;
use App\Models\User;

test('authenticated users can load the tasks index', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Test Manager',
        'email' => 'manager@example.com',
    ]);

    $task = Task::create([
        'title' => 'Test Task',
        'description' => 'Test description',
        'completed' => false,
        'manager_id' => $manager->id,
    ]);

    $this->get(route('tasks.index'))
        ->assertOk()
        ->assertSee('Test Task')
        ->assertSee(route('tasks.edit', $task))
        ->assertSee(route('tasks.destroy', $task))
        ->assertSee('Editar')
        ->assertSee('Eliminar');
});

test('authenticated users can update a task', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Test Manager',
        'email' => 'manager@example.com',
    ]);

    $task = Task::create([
        'title' => 'Old Task',
        'description' => 'Old description',
        'completed' => false,
        'manager_id' => $manager->id,
    ]);

    $this->put(route('tasks.update', $task), [
        'title' => 'Updated Task',
        'description' => 'Updated description',
        'completed' => true,
        'manager_id' => $manager->id,
    ])->assertRedirect(route('tasks.index', absolute: false));

    expect($task->fresh())
        ->title->toBe('Updated Task')
        ->description->toBe('Updated description')
        ->completed->toBeTrue();

    $this->put(route('tasks.update', $task), [
        'title' => 'Updated Task',
        'description' => 'Updated description',
        'completed' => false,
        'manager_id' => $manager->id,
    ])->assertRedirect(route('tasks.index', absolute: false));

    expect($task->fresh())->completed->toBeFalse();
});

test('task show is not exposed', function () {
    $this->actingAs(User::factory()->create());

    $manager = Manager::create([
        'name' => 'Test Manager',
        'email' => 'manager@example.com',
    ]);

    $task = Task::create([
        'title' => 'Test Task',
        'description' => 'Test description',
        'completed' => false,
        'manager_id' => $manager->id,
    ]);

    $this->get(route('tasks.show', $task))->assertNotFound();
});
