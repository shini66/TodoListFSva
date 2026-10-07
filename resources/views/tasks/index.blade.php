<x-app-layout>
    <x-slot name="header">
        <x-page-title
            title="Tareas"
            subtitle="Listado de tareas y responsables"
        />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-4 sm:px-6 lg:px-8">
            <x-status-message />

            <div class="flex justify-end">
                <a href="{{ route('tasks.create') }}" class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                    Nueva tarea
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">Tarea</th>
                            <th class="px-6 py-3 text-left">Responsable</th>
                            <th class="px-6 py-3 text-left">Estado</th>
                            <th class="px-6 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4">{{ $task->title }}</td>
                                <td class="px-6 py-4">{{ $task->manager->name }}</td>
                                <td class="px-6 py-4">
                                    {{ $task->completed ? 'Completada' : 'Pendiente' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <x-secondary-button type="button" onclick="window.location='{{ route('tasks.edit', $task) }}'">
                                            Editar
                                        </x-secondary-button>

                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('¿Eliminar esta tarea?')">
                                            @csrf
                                            @method('DELETE')

                                            <x-danger-button>
                                                Eliminar
                                            </x-danger-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-8 text-center">
                                Todavía no hay tareas.
                            </td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
