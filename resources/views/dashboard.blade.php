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
    .cent {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column;
        }
</style>
<h1 class="text-center my-4">
    {{ __('Dashboard') }}
</h1>
<div class="container cent">
    <div class="row justify-content-center w-50">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">Benvenuto {{ $user->name }}!</div>

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
    <div class="d-flex mt-5 w-100">
        <a href="{{ route("projects.index") }}" class="btn btn-success roundBtn">Vedi tutti i progetti</a>
        <a href="{{ route("types.index") }}" class="btn btn-warning roundBtn">Esplora le tipologie</a>
        <a href="{{ route("techs.index") }}" class="btn btn-primary roundBtn">Esplora le tecnologie</a>
        <a href="{{ route("devs.index") }}" class="btn btn-secondary roundBtn">Esplora gli sviluppatori</a>
    </div>
</div>
@endsection
