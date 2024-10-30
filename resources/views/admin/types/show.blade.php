@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Dettagli Tipo</h1>
    <p><strong>ID:</strong> {{ $type->id }}</p>
    <p><strong>Nome:</strong> {{ $type->name }}</p>
    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">Modifica</a>
    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>
    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Torna alla Lista</a>
</div>
@endsection
