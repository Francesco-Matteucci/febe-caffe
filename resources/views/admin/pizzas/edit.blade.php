@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Modifica Pizza</h1>
    <form action="{{ route('pizzas.update', $pizza) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pizza->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $pizza->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $pizza->price }}" required>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" {{ $pizza->is_available ? 'checked' : '' }}>
            <label class="form-check-label" for="is_available">Disponibile</label>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if ($pizza->image)
                <div class="mt-3">
                    <p>Immagine attuale:</p>
                    <img src="{{ asset('storage/' . $pizza->image) }}" alt="{{ $pizza->name }}" class="img-thumbnail" style="width: 150px; height: auto;">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-3">Aggiorna</button>
    </form>
</div>
@endsection
