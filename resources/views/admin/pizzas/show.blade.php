@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dettagli della Pizza</h1>
    <div class="card">
        <div class="card-header">
            {{ $pizza->name }}
        </div>
        <div class="card-body">
            <p><strong>Descrizione:</strong> {{ $pizza->description }}</p>
            <p><strong>Prezzo:</strong> € {{ number_format($pizza->price, 2, ',', '.') }}</p>
            <p><strong>Disponibile:</strong> {{ $pizza->is_available ? 'Sì' : 'No' }}</p>
        </div>
    </div>
    <a href="{{ route('pizzas.index') }}" class="btn btn-secondary mt-3">Torna alla lista</a>
</div>
@endsection
