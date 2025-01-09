@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Gestione del Menu Pizze</h1>
    <a href="{{ route('pizzas.create') }}" class="btn btn-primary mb-3">Aggiungi Pizza</a>

    <table class="table table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Thumb</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Disponibile</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pizzas as $pizza)
                <tr>
                    <td>
                        @if ($pizza->image)
                            <img src="{{ asset('storage/' . $pizza->image) }}" alt="{{ $pizza->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
                        @else
                            <span class="text-muted">Nessuna immagine</span>
                        @endif
                    </td>
                    <td>{{ $pizza->name }}</td>
                    <td>€ {{ number_format($pizza->price, 2, ',', '.') }}</td>
                    <td>{{ $pizza->is_available ? 'Sì' : 'No' }}</td>
                    <td>
                        <a href="{{ route('pizzas.show', $pizza) }}" class="btn btn-info btn-sm">Visualizza</a>
                        <a href="{{ route('pizzas.edit', $pizza) }}" class="btn btn-warning btn-sm">Modifica</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $pizza->id }}">
                            Elimina
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nessuna pizza trovata.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modale di conferma eliminazione -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Conferma Eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare questa pizza? Questa azione è irreversibile.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

