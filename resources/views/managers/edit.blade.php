<form method="POST" action={{ route('managers.update', $manager) }}>
    @csrf @method('PUT') @include('managers._form', ['button' => 'Actualizar'])
</form>
