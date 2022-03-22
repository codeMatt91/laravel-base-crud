@extends('layouts.main')

@section('title', 'Comic')

@section('content')
    <div class="container">
        <div class="my-4">
            <div class="m-auto">
                <div>
                    <figure>
                        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                    </figure>
                </div>
                <div>
                    <h4>{{ $comic->title }}</h4>
                    <div>Data publicazione: {{ date('m-d-y', strtotime($comic->sale_date)) }}</div>
                    <div>Prezzo: {{ $comic->price }}</div>
                    <div>Genere : {{ $comic->type }}</div>
                    <p>{{ $comic->description }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-danger">Torna in home</a>
    </div>
@endsection
