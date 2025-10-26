@extends('layouts.app')
@section('title', 'Ajouter une note')
@section('content')

<div class="row my-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h1 class="text-light fw-bold">Ajouter une note</h1>
            </div>

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body p-4">
                <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ 1 }}" />

                    <div class="form-group mb-3">
                        <label for="title"><strong>Titre:</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Entrez un titre">
                    </div>

                    <div class="form-group mb-3">
                        <label for="content"><strong>Ajouter le contenu:</strong></label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Image</strong></label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Publier</button>
                    <a href="{{ url('/') }}" class="btn btn-info">Retour à l'accueil</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection