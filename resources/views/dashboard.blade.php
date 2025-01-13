@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Titolo della Dashboard -->
    <div class="text-center mb-4">
        <h1 class="display-4 text-white fw-bold">Benvenuto nella Dashboard del Bar Febe</h1>
        <p class="lead text-white-50">Gestisci il tuo bar e pizzeria con semplicità ed efficienza</p>
    </div>

    <!-- Sezioni di gestione -->
    <div class="row g-4">
        <!-- Gestione Team -->
        <div class="col-lg-6">
            <div class="card bg-dark text-white shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-1 text-primary mb-3"></i>
                    <h5 class="card-title">Gestione Team</h5>
                    <p class="card-text">
                        Aggiungi, modifica o rimuovi i membri del tuo team per assicurarti che tutto funzioni al meglio.
                    </p>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-right-circle"></i> Vai alla Gestione Team
                    </a>
                </div>
            </div>
        </div>

        <!-- Gestione Menu -->
        <div class="col-lg-6">
            <div class="card bg-dark text-white shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-card-list display-1 text-warning mb-3"></i>
                    <h5 class="card-title">Gestione Menu</h5>
                    <p class="card-text">
                        Aggiorna il tuo menu con nuove pizze, modifica prezzi o rimuovi elementi non disponibili.
                    </p>
                    <a href="{{ route('pizzas.index') }}" class="btn btn-warning text-dark">
                        <i class="bi bi-arrow-right-circle"></i> Vai alla Gestione Menu
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-5">
        <p class="text-white-50">
            <i class="bi bi-heart-fill text-danger"></i> Creato con cura per il tuo business
        </p>
    </div>
</div>
@endsection
