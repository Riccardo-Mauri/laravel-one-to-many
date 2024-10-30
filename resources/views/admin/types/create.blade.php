@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Crea Nuovo Tipo</h1>
    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome Tipo</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Crea Tipo</button>
    </form>
</div>
@endsection
