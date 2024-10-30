<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all(); // Recupera tutti i progetti
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all(); // Recupera tutte le tipologie
        return view('admin.projects.create', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validazione dei dati in ingresso
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url', // Se l'immagine è un URL
            'is_started' => 'boolean',
            'type_id' => 'nullable|exists:types,id',
        ]);
    
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'is_started' => $request->is_started ?? false,
            'type_id' => $request->type_id, 
        ]);
    
        return redirect()->route('admin.projects.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recupera il progetto in base all'ID
        $project = Project::findOrFail($id);

        // Passa il progetto alla vista 'projects.show'
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         // Recupera il progetto in base all'ID
         $project = Project::findOrFail($id);
         // Recupera tutte le tipologie
         $types = Type::all(); 

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'is_started' => 'boolean',
            'type_id' => 'nullable|exists:types,id',
        ]);

        // Recupera il progetto in base all'ID
        $project = Project::findOrFail($id);
    
        // Aggiorna il progetto
        $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->image,
        'is_started' => $request->is_started ?? false, // Default a false se non fornito nel campo
        'type_id' => $request->type_id,
        ]);
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recupera il progetto in base all'ID
        $project = Project::findOrFail($id);
    
        // Cancella il progetto
        $project->delete();
    
        // Reindirizza con un messaggio di successo
        return redirect()->route('admin.projects.index');
    }
}
