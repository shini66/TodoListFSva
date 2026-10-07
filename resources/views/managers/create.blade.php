<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Nuevo responsable"
            subtitle="Registra una persona que pueda recibir tareas" />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl space-y-4 sm:px-6 lg:px-8">
            <x-card title="Datos del responsable">
                <form method="POST" action="{{ route('managers.store') }}">
                    @csrf

                    @include('managers._form', ['manager' => null, 'button' => 'Guardar'])
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
