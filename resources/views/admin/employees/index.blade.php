@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Gestione del Team</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Aggiungi Dipendente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ruolo</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">Visualizza</a>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Modifica</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $employee->id }}">
                            Elimina
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nessun dipendente trovato.</td>
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
                Sei sicuro di voler eliminare questo dipendente? Questa azione è irreversibile.
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

