<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Responsables"
            subtitle="Personas asignables a las tareas" />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-4 sm:px-6 lg:px-8">
            <x-status-message />
            <div class="flex justify-end">
                <a href="{{ route('managers.create') }}" class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
                    Nuevo Responsable
                </a>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                @forelse ($managers as $manager)
                    <x-card :title="$manager->name">
                        <div class="space-y-4">
                            <div class="text-sm text-gray-600">
                                <p>{{ $manager->email }}</p>
                                <p class="mt-1">{{ $manager->tasks_count }} tareas asignadas</p>
                            </div>

                            <div class="flex flex-wrap items-center gap-3">
                                <x-secondary-button type="button" onclick="window.location='{{ route('managers.edit', $manager) }}'">
                                    Editar
                                </x-secondary-button>

                                <form method="POST" action="{{ route('managers.destroy', $manager) }}" onsubmit="return confirm('¿Eliminar este responsable?')">
                                    @csrf
                                    @method('DELETE')

                                    <x-danger-button>
                                        Eliminar
                                    </x-danger-button>
                                </form>
                            </div>
                        </div>
                    </x-card>
                @empty
                    <p>Todavía no hay responsables.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
