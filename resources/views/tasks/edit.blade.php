<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Editar tarea"
            subtitle="Actualiza la información, el responsable o el estado" />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl space-y-4 sm:px-6 lg:px-8">
            <x-card title="Datos de la tarea">
                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    @include('tasks._form', [
                        'task' => $task,
                        'button' => 'Actualizar',
                    ])
                </form>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('¿Eliminar esta tarea?')">
                        @csrf
                        @method('DELETE')

                        <x-danger-button>
                            Eliminar tarea
                        </x-danger-button>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
