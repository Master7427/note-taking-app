@extends('layouts.app')

@section('title', 'Détails de la note')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>{{ $note->title }}</h1>

            @if ($note->photo)
                <img src="{{ asset('storage/images/upload/' . $note->photo) }}" width="200px" height="100px" class="mb-3">
            @endif

            <div>
                <strong>Créée le : {{ $note->created_at->format('d/m/Y H:i') }}</strong>
                <p class="lead">{{ $note->content }}</p>
            </div>

            {{-- Catégorie associée --}}
            <div class="mt-3">
                <h5>Catégorie :</h5>
                @if ($note->category)
                    <p><strong>Nom :</strong> {{ $note->category->name }}</p>
                    <a href="{{ url('categories/' . $note->category->id) }}" class="btn btn-outline-secondary btn-sm">
                        Voir toutes les notes de la catégorie "{{ $note->category->name }}"
                    </a>
                @else
                    <p>Aucune catégorie associée.</p>
                @endif
            </div>

            {{-- Boutons d'action --}}
            <div class="mt-4">
                <a href="{{ url('notes/' . $note->id . '/edit') }}" class="btn btn-warning">Modifier</a>
                <a href="{{ url('/') }}" class="btn btn-info">Retour à l'accueil</a>

                <form action="{{ url('notes/' . $note->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Voulez-vous vraiment supprimer cette note ?')">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
