@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="my-4">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{ route('comics.create') }}" class="btn btn-danger">Aggiungi Comic</a>
            </div>
            <div class="row">
                @forelse ($comics as  $comic)
                    <div class="col-12 d-flex">
                        <div>
                            <figure>
                                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                            </figure>
                        </div>
                        <div class="ms-3">
                            <a href="{{ route('comics.show', $comic->id) }}">
                                <h4>{{ $comic->title }}</h4>
                            </a>
                            <div>Data publicazione: {{ date('m-d-y', strtotime($comic->sale_date)) }}</div>
                            <div>Prezzo: {{ $comic->price }}</div>
                            <div>Genere : {{ $comic->type }}</div>
                            <p>{{ $comic->description }}</p>
                        </div>
                    </div>
                @empty
                    <h1>Non ci sono Comics</h1>
                @endforelse
            </div>
        </div>
    </div>
@endsection
