<div class="space-y-6">
    <div>
        <x-label for="name" value="Nombre" />
        <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $manager?->name) }}" required autofocus />
        <x-input-error for="name" class="mt-2" />
    </div>

    <div>
        <x-label for="email" value="Email" />
        <x-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $manager?->email) }}" required />
        <x-input-error for="email" class="mt-2" />
    </div>

    <div class="flex flex-wrap items-center justify-end gap-3">
        <x-secondary-button type="button" onclick="window.location='{{ route('managers.index') }}'">
            Cancelar
        </x-secondary-button>

        <x-button>
            {{ $button }}
        </x-button>
    </div>
</div>
