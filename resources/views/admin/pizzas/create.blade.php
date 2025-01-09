@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Aggiungi una Nuova Pizza</h1>
    <form action="{{ route('pizzas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" checked>
            <label class="form-check-label" for="is_available">Disponibile</label>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>
@endsection
