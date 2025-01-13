@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card bg-dark text-white shadow-lg" style="max-width: 400px; width: 100%;">
        <div class="card-header text-center">
            <h3 class="card-title">Accedi</h3>
        </div>
        <div class="card-body">
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

            <!-- Form di login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Ricordami
                    </label>
                </div>

                <!-- Pulsante Accedi -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <!-- Pulsante Registrazione (nascosto) -->
            <a href="{{ route('register') }}" class="btn btn-secondary btn-sm d-none">
                Registrati
            </a>
        </div>
    </div>
</div>
@endsection
