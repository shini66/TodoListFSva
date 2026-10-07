<x-app-layout>
    <x-slot name="header">
        <x-page-title title="Editar responsable"
            subtitle="Actualiza los datos de esta persona" />
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl space-y-4 sm:px-6 lg:px-8">
            <x-card title="Datos del responsable">
                <form method="POST" action="{{ route('managers.update', $manager) }}">
                    @csrf
                    @method('PUT')

                    @include('managers._form', [
                        'manager' => $manager,
                        'button' => 'Actualizar',
                    ])
                </form>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <form method="POST" action="{{ route('managers.destroy', $manager) }}" onsubmit="return confirm('¿Eliminar este responsable?')">
                        @csrf
                        @method('DELETE')

                        <x-danger-button>
                            Eliminar responsable
                        </x-danger-button>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
