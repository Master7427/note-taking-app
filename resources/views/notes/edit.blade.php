@extends('layouts.app')

@section('title', 'Modifier la note')
@section('content')
<div class="row my-3">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h1 class="text-light fw-bold">Modifier la note : {{ $note->title }}</h1>
            </div>

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body p-4">
                <form method="POST" action="{{ url('notes/' . $note->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="form-group mb-3">
                        <label for="title"><strong>Modifier le titre:</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Entrer titre" value="{{ $note->title }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Modifier l'image</strong></label>
                        <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="content"><strong>Modifier le contenu:</strong></label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $note->content }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ url('notes/' . $note->id) }}" class="btn btn-info">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection