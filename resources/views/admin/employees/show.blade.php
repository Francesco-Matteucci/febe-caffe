@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dettagli Dipendente</h1>
    <div class="card">
        <div class="card-header">
            {{ $employee->name }}
        </div>
        <div class="card-body">
            <p><strong>Ruolo:</strong> {{ $employee->role }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Telefono:</strong> {{ $employee->phone }}</p>
        </div>
    </div>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Torna alla lista</a>
</div>
@endsection
