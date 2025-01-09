@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Modifica Dipendente</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Ruolo</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled>Seleziona un ruolo</option>
                @foreach ($roles as $role)
                    <option value="{{ $role }}" @if ($employee->role === $role) selected @endif>{{ $role }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection
