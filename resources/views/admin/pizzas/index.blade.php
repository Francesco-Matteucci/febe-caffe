@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Pulsante per aggiungere una nuova pizza -->
    <div class="text-center">
        <a href="{{ route('pizzas.create') }}" class="btn btn-primary mb-4">
            <i class="bi bi-plus-circle"></i> Aggiungi Nuova Pizza
        </a>
    </div>

    @if ($pizzas->count() > 0)
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Gestione del Menu Pizze</h1>
            <h1 class="text-white">Pizze trovate: {{ $pizzas->count() }}</h1>
        </div>

        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5 class="card-title mb-0">Lista Pizze</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-bordered align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>Immagine</th>
                                <th>Nome</th>
                                <th>Prezzo</th>
                                <th>Disponibile</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pizzas as $pizza)
                                <tr>
                                    <!-- Immagine ridimensionata -->
                                    <td class="text-center" style="max-width: 120px">
                                        @if ($pizza->image)
                                            <img src="{{ asset('storage/' . $pizza->image) }}" alt="{{ $pizza->name }}"
                                                class="img rounded" style="max-width: 100px; min-width:80px; height: auto;">
                                        @else
                                            <span class="text-muted">Nessuna immagine</span>
                                        @endif
                                    </td>
                                    <!-- Nome pizza -->
                                    <td class="fw-bold text-center">{{ $pizza->name }}</td>
                                    <!-- Prezzo -->
                                    <td class="text-center">€ {{ number_format($pizza->price, 2, ',', '.') }}</td>
                                    <!-- Stato Disponibilità -->
                                    <td class="text-center">
                                        @if ($pizza->is_available)
                                            <span class="badge bg-success fs-6">
                                                <i class="bi bi-check-circle"></i>
                                                <span class="d-none d-sm-inline">Disponibile</span>
                                            </span>
                                        @else
                                            <span class="badge bg-danger fs-6">
                                                <i class="bi bi-x-circle"></i>
                                                <span class="d-none d-sm-inline">Non disponibile</span>
                                            </span>
                                        @endif
                                    </td>
                                    <!-- Azioni -->
                                    <td class="text-center">
                                        <div class="d-flex flex-column gap-2">
                                            <!-- Modifica -->
                                            <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Modifica
                                            </a>

                                            <!-- Toggle Disponibilità -->
                                            @if ($pizza->is_available)
                                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#toggleMenuModal-{{ $pizza->id }}">
                                                    <i class="bi bi-eye-slash"></i> Fuori Menù
                                                </button>
                                            @else
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#toggleMenuModal-{{ $pizza->id }}">
                                                    <i class="bi bi-eye"></i> Nel Menù
                                                </button>
                                            @endif

                                            <!-- Elimina -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $pizza->id }}">
                                                <i class="bi bi-trash"></i> Elimina
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Toggle Disponibilità -->
                                <div class="modal fade text-dark" id="toggleMenuModal-{{ $pizza->id }}" tabindex="-1"
                                    aria-labelledby="toggleMenuModalLabel-{{ $pizza->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Conferma Cambio Stato</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($pizza->is_available)
                                                    Sei sicuro di voler mettere la pizza <strong>{{ $pizza->name }}</strong> fuori menù?
                                                @else
                                                    Sei sicuro di voler inserire la pizza <strong>{{ $pizza->name }}</strong> nel menù?
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Annulla
                                                </button>
                                                <form action="{{ route('pizzas.toggle', $pizza->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn {{ $pizza->is_available ? 'btn-secondary' : 'btn-primary' }}">
                                                        {{ $pizza->is_available ? 'Fuori Menù' : 'Nel Menù' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Eliminazione -->
                                <div class="modal fade text-dark" id="deleteModal-{{ $pizza->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel-{{ $pizza->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Conferma Eliminazione</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare la pizza <strong>{{ $pizza->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Annulla
                                                </button>
                                                <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <h5 class="text-center my-3">Non hai ancora inserito pizze...</h5>
    @endif
</div>
@endsection
