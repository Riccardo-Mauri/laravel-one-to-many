@extends('layouts.app')

@section('page-title', 'Progetti')

@section('main-content')
    <h1>Elenco Progetti</h1>

    @if ($projects->isEmpty())
        <p>Nessun progetto trovato.</p>
    @else
        <ul class="list-unstyled">
            @foreach ($projects as $project)
                <li class="mb-3">
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="text-decoration-none">
                        {{ $project->title }}
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler cancellare questo progetto?');">
                            Elimina
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
