@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Aggiungi un Nuovo Dipendente</h1>

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

    <!-- Form di creazione -->
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <!-- Ruolo -->
        <div class="mb-3">
            <label for="role" class="form-label">Ruolo</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled selected>Seleziona un ruolo</option>
                @foreach ($roles as $role)
                    <option value="{{ $role }}" {{ old('role') === $role ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Telefono -->
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <!-- Salva -->
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>
@endsection
