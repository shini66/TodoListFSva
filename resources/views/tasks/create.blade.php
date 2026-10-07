<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Nueva tarea"
            subtitle="Crea una nueva tarea y asígnala a un responsable" />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl space-y-4 sm:px-6 lg:px-8">
            <x-card title="Datos de la tarea">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    @include('tasks._form', ['task' => null, 'button' => 'Guardar'])
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
