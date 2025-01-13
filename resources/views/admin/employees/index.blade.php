@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Pulsante per aggiungere un nuovo dipendente -->
    <div class="text-center">
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-4">
            <i class="bi bi-plus-circle"></i> Aggiungi Nuovo Dipendente
        </a>
    </div>

    @if ($employees->count() > 0)
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Gestione Team</h1>
            <h1 class="text-white">Dipendenti trovati: {{ $employees->count() }}</h1>
        </div>

        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5 class="card-title mb-0">Lista Dipendenti</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-bordered align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>Nome</th>
                                <th>Ruolo</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <!-- Nome dipendente -->
                                    <td class="fw-bold text-center">{{ $employee->name }}</td>
                                    <!-- Ruolo -->
                                    <td class="text-center">{{ $employee->role }}</td>
                                    <!-- Email -->
                                    <td class="text-center">{{ $employee->email }}</td>
                                    <!-- Telefono -->
                                    <td class="text-center">{{ $employee->phone ?? 'Non disponibile' }}</td>
                                    <!-- Azioni -->
                                    <td class="text-center">
                                        <div class="d-flex flex-column gap-2">
                                            <!-- Modifica -->
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Modifica
                                            </a>
                                            <!-- Elimina -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $employee->id }}">
                                                <i class="bi bi-trash"></i> Elimina
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Eliminazione -->
                                <div class="modal fade text-dark" id="deleteModal-{{ $employee->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel-{{ $employee->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Conferma Eliminazione</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare il dipendente <strong>{{ $employee->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Annulla
                                                </button>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
        <h5 class="text-center my-3">Non hai ancora inserito dipendenti...</h5>
    @endif
</div>
@endsection
