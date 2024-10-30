@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Modifica Tipo</h1>
    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome Tipo</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Tipo</button>
    </form>
</div>
@endsection
