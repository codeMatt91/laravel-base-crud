@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @if (session('message'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <div class="my-4">
            <div class="d-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('comics.create') }}" class="btn btn-danger">Aggiungi Comic</a>
            </div>
            <div class="row">
                @forelse ($comics as  $comic)
                    <div class="col-6 d-flex">
                        <div>
                            <figure>
                                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                            </figure>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex flex-column align-items-between">
                                <a href="{{ route('comics.show', $comic->id) }}">
                                    <h5>{{ $comic->title }}</h5>
                                </a>
                                <div>Data publicazione: {{ date('m-d-y', strtotime($comic->sale_date)) }}</div>
                                <div>Prezzo: {{ $comic->price }}</div>
                                <div>Genere : {{ $comic->type }}</div>
                            </div>
                            <div>
                                <a class="btn btn-sm btn-warning" href="{{ route('comics.edit', $comic->id) }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @empty
                    <h1>Non ci sono Comics</h1>
                @endforelse
            </div>
        </div>
    </div>
@endsection
