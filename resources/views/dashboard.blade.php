@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Bar Management System') }}</div>

                <div class="card-body text-center">
                    <h4>{{ __('Welcome to the Management Dashboard') }}</h4>
                    <p>{{ __('Here you can manage your team, update the menu, and keep track of everything related to your bar and pizzeria.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
