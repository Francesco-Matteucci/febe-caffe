@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Gestione del Team</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Aggiungi Dipendente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ruolo</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">Visualizza</a>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Modifica</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nessun dipendente trovato.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
