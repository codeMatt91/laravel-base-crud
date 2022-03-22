@extends('layouts.main')

@section('title', 'Form di modifica')

@section('content')
    <div class="container">
        <form action="{{ route('comics.store') }}" method="POST" class="my-5">
            @csrf
            <div class="mb-4">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" id="title" placeholder="Inserisci un titolo">
            </div>
            <div class="mb-4">
                <label for="thumb" class="form-label">Foto</label>
                <input type="text" id="thumb" placeholder="Inserisci una foto" name="thumb">
            </div>
            <div class="mb-4">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" id="price" placeholder="Inserisci un prezzo" name="price">
            </div>
            <div class="mb-4">
                <label for="series" class="form-label">Serie</label>
                <input type="text" id="series" name="series">
            </div>
            <div class="mb-4">
                <label for="date" class="form-label">Data</label>
                <input type="date" id="date" name="sale_date">
            </div>
            <div class="mb-4">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" id="type" name="type" placeholder="Inserisci una tipologia">
            </div>

            <div class="mb-4">
                <label for="text-area" class="form-label">Descrizione</label> <br>
                <textarea class="form-control" id="text-area" rows="3" placeholder="Inserisci una descrizione"
                    name="'description"></textarea>
            </div>
            <a href="" type="submit" class="btn btn-danger">Invia</a>
            <a href="" class="btn btn-success" type="reset">Svuota</a>
        </form>
    </div>
@endsection
