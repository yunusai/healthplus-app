@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ __('You are logged in as ') }} {{ auth()->user()->nama }}
                    @else
                        {{ __('You are not logged in.') }}
                    @endauth
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
