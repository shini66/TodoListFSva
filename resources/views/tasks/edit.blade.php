<form method="POST" action={{ route('tasks.update', $task) }}>
    @csrf @method('PUT') @include('tasks._form', ['button' => 'Actualizar'])
</form>
