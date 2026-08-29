<form method="POST" action={{ route('tasks.store') }}>
    @csrf @include('tasks._form', ['task' => null, 'button' => 'Guardar'])
</form>
