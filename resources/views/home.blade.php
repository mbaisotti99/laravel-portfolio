@extends("layouts.master")

@section("titolo", "HomePage")

@section("contenuto")
<style>
    .logOrReg{
        display: flex;
        width: 100%;
        justify-content: center;
        padding: 25px 0;
    }
</style>
<div class="container text-center pt-5">
    <h1>
        Benvenuto in My Portfolio
    </h1>
    <p>
        In questo sito potrai visualizzare il tuo portfolio completo!
    </p>
    <div class="logOrReg">
        <a href="/login" class="btn btn-primary">Effettua il login</a>
        <p class="mx-3">oppure</p>
        <a href="/register" class="btn btn-primary">Crea un account</a>
    </div>
</div>
@endsection