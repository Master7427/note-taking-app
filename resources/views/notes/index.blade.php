@extends('layouts.app')
  
@section('content')

<div class="row">
    <div class="col-lg-10">
        <h2>Notes</h2>
    </div>

    <div class="col-lg-2">
        <a class="btn btn-success" href="{{ url('notes/create') }}"> @lang('Create New Note')</a>
    </div>
    
    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



<div class="container">

    <div class="row">
        @foreach ($notes as $index => $note)
        <div class="col-md-4">
            <div class="card card-body">
         {{--  si vous voulez avoir le titre de votre données cliquable (ici c'est le titre de l'article) utiliser le bout de code ci-bas>    
               {{--  <a href="{{ url('notes/'. $note->id) }}">
                <h2>
                        {{ $note->title }}
                    </h2>
                   
                </a>  --}}
               
                    <h2>
                            {{ $note->title }}
                        </h2>

                {{ $note->content }}

            <a href="{{ url('notes/'. $note->id) }}" class="btn btn-outline-primary">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
            <a href="{{ url('notes/'. $note->id) }}" class="btn btn-outline-primary">@lang('general.En savoir plus')</a>
            </div>
        </div>
      
    </div>
</div>


@endsection 

