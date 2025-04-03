@extends('layouts.master')

@section("titolo", "Dashboard")


@section('contenuto')
<style>
    .card-body{
        display: flex;
        justify-content: space-between; 
    }
    .roundBtn{
        width: 200;
        height: 200;
        border-radius: 100px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 22px;
        border: 2px solid black;
        box-shadow: 15px 10px 15px 5px black;
        margin: 25px auto;
    }
</style>
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Login effettuato con successo!') }}
                    <a href="/admin/profilo" class="btn btn-primary">Vedi il tuo profilo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5">
        <a href="{{ route("projects.index") }}" class="btn btn-success roundBtn">Vedi tutti i progetti</a>
        <a href="{{ route("types.index") }}" class="btn btn-warning roundBtn">Esplora le tipologie</a>
    </div>
</div>
@endsection
