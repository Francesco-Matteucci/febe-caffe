@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Modifica Pizza</h1>

    <!-- Sezione per errori di validazione -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form di modifica -->
    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pizza->name) }}" required>
        </div>

        <!-- Descrizione -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $pizza->description) }}</textarea>
        </div>

        <!-- Prezzo -->
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $pizza->price) }}" required>
        </div>

        <!-- Disponibilità -->
        <div class="form-check mb-3">
            <input type="hidden" name="is_available" value="0">
            <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', $pizza->is_available) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_available">Disponibile</label>
        </div>

        <!-- Immagine -->
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <!-- Salva -->
        <button type="submit" class="btn btn-primary mt-3">Aggiorna</button>
    </form>
</div>
@endsection
