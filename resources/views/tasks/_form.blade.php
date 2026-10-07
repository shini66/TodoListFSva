<div class="space-y-6">
    <div>
        <x-label for="title" value="Título" />
        <x-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $task?->title) }}" required autofocus />
        <x-input-error for="title" class="mt-2" />
    </div>

    <div>
        <x-label for="description" value="Descripción" />
        <x-input id="description" name="description" type="text" class="mt-1 block w-full" value="{{ old('description', $task?->description) }}" />
        <x-input-error for="description" class="mt-2" />
    </div>

    <div>
        <x-label for="manager_id" value="Responsable" />
        <select id="manager_id" name="manager_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="" selected disabled>Selecciona un responsable</option>
            @foreach ($managers as $manager)
                <option value="{{ $manager->id }}" @selected(old('manager_id', $task?->manager_id) == $manager->id)>{{ $manager->name }}</option>
            @endforeach
        </select>
        <x-input-error for="manager_id" class="mt-2" />
    </div>

    <div>
        <input type="hidden" name="completed" value="0">
        <label class="inline-flex items-center gap-2 text-sm text-gray-700">
            <input type="checkbox" name="completed" value="1" @checked(old('completed', $task?->completed)) class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
            Completada
        </label>
    </div>

    <div class="flex flex-wrap items-center justify-end gap-3">
        <x-secondary-button type="button" onclick="window.location='{{ route('tasks.index') }}'">
            Cancelar
        </x-secondary-button>

        <x-button type="submit">
            {{ $button }}
        </x-button>
    </div>
</div>
