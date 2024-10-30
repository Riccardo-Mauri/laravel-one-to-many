@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei loggato!
                    </h1>
                    <br>
                    La dashboard è una pagina privata (protetta dal middleware)
                </div>
            </div>
        </div>
        <div>
            <h1>Progetti</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Nuovo Progetto</a>
            @if ($projects->isEmpty())
                <p>Nessun progetto trovato.</p>
            @else
                <ul>
                    @foreach ($projects as $project)
                        <li>
                            <a href="{{ route('admin.projects.show', $project->id) }}">
                                {{ $project->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
