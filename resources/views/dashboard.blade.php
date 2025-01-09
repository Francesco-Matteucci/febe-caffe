@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Gestionale del bar Febe') }}</div>

                <div class="card-body text-center">
                    <h4>{{ __('Benvenuto nella Dashboard del Bar Febe') }}</h4>
                    <p>{{ __('Qui puoi gestire il tuo team, aggiornare il menu e tenere traccia di tutto ciò che riguarda il tuo bar e pizzeria.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
