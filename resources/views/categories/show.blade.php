@extends('layouts.app')

@section('title', 'Notes de la catégorie')
@section('content')
<div class="container">
    <h1>Catégorie : {{ $category->name }}</h1>
   
    <h2>Notes associées :</h2>
    @forelse ($notes as $note)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $note->title }}</h3>
                <p>{{ $note->content }}</p>
                <a href="{{ url('notes/' . $note->id) }}" class="btn btn-primary">Voir la note</a>
            </div>
        </div>
    @empty
        <p>Aucune note dans cette catégorie.</p>
    @endforelse
</div>
@endsection
